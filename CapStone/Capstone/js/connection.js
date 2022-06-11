window.onload = function(){
    document.querySelector(".addr").addEventListener("click", function(){ //주소입력칸을 클릭하면
        //카카오 지도 발생
        new daum.Postcode({
            oncomplete: function(data) { //선택시 입력값 세팅
                document.querySelector(".addr").value = data.roadAddress; // 주소 넣기
                document.querySelector("input[name=create-address]").focus(); //상세입력 포커싱
            }
        }).open();
    });
}