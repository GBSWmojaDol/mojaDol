<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/699db093f5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/AddStore.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>MojaDoll</title>
</head>

<body>
    <header class="shop-header">
        <form class="shop-form" @if ($info !== null) action={{"/shop/list/".$info->shop_idx."/"."modify"}} @else action="/shop/create" @endif method="post" enctype="multipart/form-data"
        onsubmit="return onSubmit()">
            @method('post')
            @csrf
            <div class="Shop">
                <div class="top-ui">
                    <div>
                        <a href="/Main" aria-label="Error">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                        <p class="bottom-bar"></p>
                    </div>
                </div>
                <div>
                    <div class="bottom-ui">
                        <input type="text" id="shop_name" name="shop_name" placeholder="상점 이름" @if ($info !== null) value={{$info->shop_name}} @endif > <br>
                        <input type="text" id="shop_addr" name="shop_addr" placeholder="상점 주소" @if ($info !== null) value={{$info->shop_addr}} @endif > <br>
                        <input type="text" id="shop_addr2" name="shop_addr2" placeholder="상점 상세주소" @if ($info !== null) value={{$info->shop_addr2}} @endif ><br>

                        <div class="shop-num">
                            <p class="Num_Text"> 전화번호 : </p>
                            <select id="first_num" name="tel1">
                                <option value="num" disabled selected>앞자리를 선택해주세요</option>
                                <option value="02" @if ($info !== null && "02" == $info->tel_num1) selected @endif>02</option>
                                <option value="031" @if ($info !== null && "031" == $info->tel_num1) selected @endif>031</option>
                                <option value="032" @if ($info !== null && "032" == $info->tel_num1) selected @endif>032</option>
                                <option value="033" @if ($info !== null && "033" == $info->tel_num1) selected @endif>033</option>
                                <option value="041" @if ($info !== null && "041" == $info->tel_num1) selected @endif>041</option>
                                <option value="042" @if ($info !== null && "042" == $info->tel_num1) selected @endif>042</option>
                                <option value="043" @if ($info !== null && "043" == $info->tel_num1) selected @endif>043</option>
                                <option value="044" @if ($info !== null && "044" == $info->tel_num1) selected @endif>044</option>
                                <option value="051" @if ($info !== null && "051" == $info->tel_num1) selected @endif>051</option>
                                <option value="052" @if ($info !== null && "052" == $info->tel_num1) selected @endif>052(2)</option>
                                <option value="053" @if ($info !== null && "053" == $info->tel_num1) selected @endif>053</option>
                                <option value="054" @if ($info !== null && "054" == $info->tel_num1) selected @endif>054</option>
                                <option value="055" @if ($info !== null && "055" == $info->tel_num1) selected @endif>055</option>
                                <option value="061" @if ($info !== null && "061" == $info->tel_num1) selected @endif>061</option>
                                <option value="062" @if ($info !== null && "062" == $info->tel_num1) selected @endif>062</option>
                                <option value="063" @if ($info !== null && "063" == $info->tel_num1) selected @endif>063</option>
                                <option value="064" @if ($info !== null && "064" == $info->tel_num1) selected @endif>064(7)</option>
                            </select> - <input placeholder="0000" type="number" name="tel2" id="middle_num"
                            min="1000" max="9999" @if ($info !== null) value={{$info->tel_num2}} @endif> - <input placeholder="0000" type="number" name="tel3"
                            id="end_num" min="1000" max="9999" @if ($info !== null) value={{$info->tel_num3}} @endif>
                        </div>

                        <div class="menu">
                            <p class="Check">대표 메뉴 :</p>
                            <input type="text" name="menuName" id="menuName" placeholder="대표메뉴입력" @if ($menu !== null) value={{$menu->menu_name}} @endif />
                            <input type="number" name="menuPrice" id="menuPrice" placeholder="가격입력" @if ($menu !== null) value={{$menu->menu_price}} @endif /> <span
                                class="won">원</span>
                            <input type="file" name="menuImage" id="menuImage" placeholder="사진" accept="image/png, image/jpeg" />
                            <label for="menuImage" id="image_label">사진</label>
                        </div>

                        <div class="Check_Groups">
                            <div class="Package">
                                <p class="Check">포장 여부 :</p>
                                <input type="hidden" name="package" value="0">
                                <input placeholder="0000" type="checkbox" name="package" value="1"
                                    class="CheckBox" @if ($info !== null && $info->package_bool == "1") checked @endif>
                            </div>
                        </div>

                        <div class="Check_Groups">
                            <div class="Toilet">
                                <p class="Check">화장실 여부 :</p>
                                <input type="hidden" name="toilet" value="0">
                                <input placeholder="0000" type="checkbox" name="toilet" value="1"
                                    class="CheckBox" @if ($info !== null && $info->toilet_bool == "1") checked @endif>
                            </div>
                        </div>

                        <div class="Check_Groups">
                            <div class="Internet">
                                <p class="Check">인터넷 여부 :</p>
                                <input type="hidden" name="internet" value="0">
                                <input placeholder="0000" type="checkbox" name="internet" value="1"
                                    class="CheckBox"@if ($info !== null && $info->internet_bool == "1") checked @endif>
                            </div>
                        </div>

                        <div class="Check_Groups">
                            <div class="Reserv">
                                <p class="Check">예약 여부 :</p>
                                <input type="hidden" name="	reserv" value="0">
                                <input placeholder="0000" type="checkbox" name="reserv" value="1"
                                    class="CheckBox"@if ($info !== null && $info->reserv_bool == "1") checked @endif>
                            </div>
                        </div>

                    </div>

                    <div class="Category_Check">
                        <select id="Category" name="category_num">
                            <option value="Category" selected disabled>음식점의 카테고리를 선택해주세요</option>
                            <option value="1" @if ($info !== null && "1" == $info->category_num) selected @endif>일식</option>
                            <option value="2" @if ($info !== null && "2" == $info->category_num) selected @endif>중식</option>
                            <option value="3" @if ($info !== null && "3" == $info->category_num) selected @endif>치킨</option>
                            <option value="4" @if ($info !== null && "4" == $info->category_num) selected @endif>밥류</option>
                            <option value="5" @if ($info !== null && "5" == $info->category_num) selected @endif>디저트</option>
                            <option value="6" @if ($info !== null && "6" == $info->category_num) selected @endif>피자</option>
                            <option value="7" @if ($info !== null && "7" == $info->category_num) selected @endif>양식</option>
                            <option value="8" @if ($info !== null && "8" == $info->category_num) selected @endif>아시안</option>
                            <option value="9" @if ($info !== null && "9" == $info->category_num) selected @endif>야식</option>
                            <option value="10" @if ($info !== null && "10" == $info->category_num) selected @endif>고기</option>
                            <option value="11" @if ($info !== null && "11" == $info->category_num) selected @endif>패스트푸드</option>
                            <option value="12" @if ($info !== null && "12" == $info->category_num) selected @endif>보쌈</option>
                            <option value="13" @if ($info !== null && "13" == $info->category_num) selected @endif>기타</option>
                        </select>
                    </div>

                    <div class="site-addr">
                        <input type="text" id="site-addr_name" name="site_addr"
                            placeholder="가게의 별도 사이트나 SNS계정 URL첨부."
                            @if ($info !== null && null !== $info->site_addr) value={{$info->site_addr}} @endif>
                    </div>

                    <div id="create-form">
                        <input type="submit" value="Add Store" class="a-button">
                    </div>

                </div>
            </div>
        </form>
    </header>
</body>

<script>
    function onSubmit() {
        if (document.querySelector('#shop_name').value.length == 0) {
            alert('상점 이름을 입력해주세요');
            return false;
        }

        if (document.querySelector('#shop_addr').value.length == 0) {
            alert('상점 주소를 입력해주세요');
            return false;
        }

        if (document.querySelector('#shop_addr2').value.length == 0) {
            alert('상점 상세주소 입력해주세요');
            return false;
        }

        if (document.querySelector('#first_num').value == "num") {
            alert('전화번호 앞자리를 입력해주세요');
            return false;
        }

        if (document.querySelector('#middle_num').value.length == 0) {
            alert('전화번호 중간자리를 입력해주세요');
            return false;
        }

        if (document.querySelector('#end_num').value.length == 0) {
            alert('전화번호 끝자리 입력해주세요');
            return false;
        }

        if (document.querySelector('#Category').value == "Category") {
            alert('카테고리를 선택해주세요');
            return false;
        }

        return true;
    }
</script>

</html>
