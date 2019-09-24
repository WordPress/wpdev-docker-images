#!/bin/bash
set -e


############################################################
# Functions
############################################################

###
### Log to stdout/stderr
###
log() {
    local type="${1}"     # ok, warn or err
    local message="${2}"  # msg to print

    local clr_ok="\033[0;32m"
    local clr_info="\033[0;34m"
    local clr_warn="\033[0;33m"
    local clr_err="\033[0;31m"
    local clr_rst="\033[0m"

    if [ "${type}" = "warn" ]; then
        printf "${clr_warn}[WARN] %s${clr_rst}\n" "${message}" 1>&2	# stdout -> stderr
    elif [ "${type}" = "err" ]; then
        printf "${clr_err}[ERR]  %s${clr_rst}\n" "${message}" 1>&2	# stdout -> stderr
    else
        printf "${clr_err}[???]  %s${clr_rst}\n" "${message}" 1>&2	# stdout -> stderr
    fi
}

###
### Is argument a positive integer?
###
isint() {
	test -n "${1##*[!0-9]*}"
}

###
### Helper
###
_get_username_by_uid() {
    if getent="$( getent passwd "${1}" )"; then
        echo "${getent//:*}"
        return 0
    fi
    return 1
}
_get_groupname_by_gid() {
    if getent="$( getent group "${1}" )"; then
        echo "${getent//:*}"
        return 0
    fi
    return 1
}


###
### Change UID
###
set_uid() {
    local uid="${1}"
    local username="${2}"
    local groupname="${3}"

    # spare UID to change another user to
    local spare_uid=9876

    if ! isint "${uid}"; then
        log "err" "${uid} is not a valid UID"
        exit 1
    else
        # Username with this UID already exists
        if target_username="$( _get_username_by_uid "${uid}" )"; then
            # It is not our user, so we need to change their UID to something else first
            if [ "${target_username}" != "${username}" ]; then
                log "warn" "User with ${uid} already exists: ${target_username}"
                usermod -u "${spare_uid}" "${target_username}"
            fi
        # UID not found, let's create a new user
        else
            useradd -M -u "${uid}" -s /bin/bash -g "${groupname}" "${username}"
            return 0
        fi
        usermod -u "${uid}" "${username}"
    fi
}


###
### Change GID
###
set_gid() {
    local gid="${1}"
    local groupname="${2}"

    # spare GID to change another group to
    local spare_gid=9876

    if ! isint "${gid}"; then
        log "err" "${gid} is not a valid GID"
        exit 1
    else
        # Groupname with this GID already exists
        if target_groupname="$( _get_groupname_by_gid "${gid}" )"; then
            # It is not our group, so we need to change their GID to something else first
            if [ "${target_groupname}" != "${groupname}" ]; then
                log "warn" "Group with ${gid} already exists: ${target_groupname}"
                groupmod -g "${spare_gid}" "${target_groupname}"
            fi
        # GID not found, let's create a new group
        else
            groupadd -g "${gid}" -r "${groupname}"
            return 0
        fi
        groupmod -g "${gid}" "${groupname}"
    fi
}
