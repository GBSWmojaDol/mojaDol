function CheckInfo() {
    let id = document.querySelector('.id');
    let pw = document.querySelector('.pw');
    let pw_chk = document.querySelector('.pw-chk');
    let addr = document.querySelector('.addr');


    if (id.value === "" && pw.value === "" && pw_chk.value === "" && addr.value === "") {
        alert("공백이 있습니다 확인을 해주세요");
        return false;
    }
    else {
        if (pw.value !== pw_chk.value) {
            alert("비밀번호와 비밀번호 확인이 다릅니다. 다시 한 번 확인해주세요.")
            return false;
        } else {
            return true;
        }
    }
}
