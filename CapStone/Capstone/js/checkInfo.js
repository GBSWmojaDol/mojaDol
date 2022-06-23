function CheckInfo() {
    let id = document.querySelector('.id');
    let pw = document.querySelector('.pw');
    let pw_chk = document.querySelector('.pw-chk');
    let addr = document.querySelector('.addr');
    let nick = document.querySelector('.nickname');

    if (id.value == "") {
        alert("아이디를 입력해주세요");
        return false;
    }

    if (pw.value == "") {
        alert("비밀번호를 입력해주세요");
        return false;
    }

    if (pw_chk.value == "") {
        alert("비밀번호를 다시 한 번 입력해주세요");
        return false;
    }

    if (pw.value != pw_chk.value) {
        alert("일치하지 않습니다. 다시 한 번 확인해주세요");
        return false;
    }

    if (nick.value == "") {
        alert("닉네임을 입력해주세요");
        return false;
    }

    if (addr.value == "") {
        alert("주소를 입력해주세요");
        return false;
    }

    return true;
}
