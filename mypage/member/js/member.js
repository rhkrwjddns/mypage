function check_input() {
    if (!document.member_form.id.value) {
        alert("아이디를 입력하세요!");
        document.member_form.id.focus();
        return;
    }

    if (!document.member_form.pass.value) {
        alert("비밀번호를 입력하세요!");
        document.member_form.pass.focus();
        return;
    }

    if (!document.member_form.pass_confirm.value) {
        alert("비밀번호확인을 입력하세요!");
        document.member_form.pass_confirm.focus();
        return;
    }

    if (!document.member_form.name.value) {
        alert("이름을 입력하세요!");
        document.member_form.name.focus();
        return;
    }

    var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
    if (document.member_form.email1.value.match(regExp) != null) { alert('Good!'); } else {
        alert('Error');
    }

    if (!document.member_form.email1.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email1.focus();
        return;
    } else if (!document.member_form.email2.value){
        alert("이메일 주소를 입력하세요!");
        document.member_form.email2.focus();
        return;
    } else if (document.member_form.email1.value.match(regExp) != null) {
        alert("이메일 패턴이 맞지 않습니다.");
        document.member_form.email1.value = "";
        document.member_form.email2.value = "";
        document.member_form.email1.focus();
    }

    if (!document.member_form.email2.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email2.focus();
        return;
    }

    if (document.member_form.pass.value !=
        document.member_form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
        document.member_form.pass.focus();
        document.member_form.pass.select();
        return;
    }

    document.member_form.submit();
}

function reset_form() {
    document.member_form.id.value = "";
    document.member_form.pass.value = "";
    document.member_form.pass_confirm.value = "";
    document.member_form.name.value = "";
    document.member_form.email1.value = "";
    document.member_form.email2.value = "";
    document.member_form.id.focus();
    return;
}

function check_id() {
    window.open("member_check_id.php?id=" + document.member_form.id.value,
        "IDcheck",
        "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
}