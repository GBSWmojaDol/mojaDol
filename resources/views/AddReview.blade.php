<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/699db093f5.js" crossorigin="anonymous"></script>
    <title>Review</title>
    <link rel="stylesheet" href="{{ URL::asset('css/AddReview.css')}}">
</head>

<body>
    <form @if ($review !== null) action="{{url('/')}}/shop/review/modify" @else action="{{url('/')}}/shop/review" @endif method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <input type="hidden" name="id" value={{$id}}>
    <div class="review-container" id="show-div">
        <div class="review-area">
            <input type="file" name="img" id="file" accept="image/png, image/jpeg">
            <label for="file" class="Image-in-Textarea">사진넣기</label>
            <textarea id="text" name="content">@if ($review !== null) {{$review->review_content}}  @endif</textarea>
        </div>
        <div class="star-rating space-x-4 mx-auto">
            <input type="radio" id="5-stars" name="rating" value="5" v-model="ratings" @if ($review !== null && $review->review_star == 5) checked @endif />
            <label for="5-stars" class="star pr-4">★</label>
            <input type="radio" id="4-stars" name="rating" value="4" v-model="ratings" @if ($review !== null && $review->review_star == 4) checked @endif  />
            <label for="4-stars" class="star">★</label>
            <input type="radio" id="3-stars" name="rating" value="3" v-model="ratings" @if ($review !== null && $review->review_star == 3) checked @endif  />
            <label for="3-stars" class="star">★</label>
            <input type="radio" id="2-stars" name="rating" value="2" v-model="ratings" @if ($review !== null && $review->review_star == 2) checked @endif  />
            <label for="2-stars" class="star">★</label>
            <input type="radio" id="1-stars" name="rating" value="1" v-model="ratings" @if ($review !== null && $review->review_star == 1) checked @endif  />
            <label for="1-star" class="star">★</label>
        </div>
        <input type="submit" value="작성하기" class="Add_Review" />
    </div>
    </form>
</body>
<script>
    function test() {
        console.log(1);
    }
</script>
</html>
