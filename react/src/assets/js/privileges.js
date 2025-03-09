
function getUserPrivileges() {
    return Userprivileges;
}

function getPrivilegePermissions(privilegeName) {
    return Userprivileges[privilegeName];
}


function userHasPrivilege(privilegeName) {
    return !!Userprivileges[privilegeName];
}

function userHasPrivilegeOn(privilegeName, on) {
    return !!Userprivileges[privilegeName][on];
}

