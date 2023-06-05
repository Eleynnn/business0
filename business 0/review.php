<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }
        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }
        .star-light {
            color: #e9ecef;
        }
    </style>
</head>
<body>

    
    <div class="container">
        <h1 class="mt-5 mb-5">Review & Rating System</h1>
        <div class="card">
            <?php
            // Retrieve the image para meter from the URL
            $image = $_GET['image'];

            // Decode the URL-encoded image parameter
            $image = urldecode($image);

            // Display the image
            echo '<img src="' . $image . '" alt="Business Image" class="img-fluid mb-4" id="image" />';
            ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                            <b><span id="average_rating">0.0</span> / 5</b>
                        </h1>
                        <div class="mb-3">
                            <?php
                            // Display 5 empty stars
                            for ($i = 0; $i < 5; $i++) {
                                echo '<i class="fas fa-star star-light"></i>';
                            }
                            ?>
                        </div>
                        <h6 class="text-muted">Average Rating</h6>
                    </div>
                    <div class="col-sm-8">
                        <h6 class="text-muted mt-4">Individual Ratings:</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-label-left">5 stars</span>
                                <span class="progress-label-right">0%</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-label-left">4 stars</span>
                                <span class="progress-label-right">0%</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-label-left">3 stars</span>
                                <span class="progress-label-right">0%</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-label-left">2 stars</span>
                                <span class="progress-label-right">0%</span>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <span class="progress-label-left">1 star</span>
                                <span class="progress-label-right">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <h6 class="text-muted mt-4">Recent Reviews:</h6>
                <ul class="list-unstyled mb-0" id="reviews_list">
                </ul>
                <form id="review_form" class="mt-4">
                    <h6 class="text-muted">Submit Your Review:</h6>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select class="form-control" id="rating" name="rating">
                            <option value="1">1 star</option>
                            <option value="2">2 stars</option>
                            <option value="3">3 stars</option>
                            <option value="4">4 stars</option>
                            <option value="5">5 stars</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Calculate and update average rating based on individual ratings
            function updateAverageRating() {
                var sum = 0;
                var count = 0;
                $('.individual-rating').each(function() {
                    sum += parseFloat($(this).text());
                    count++;
                });

                var averageRating = (count > 0) ? (sum / count).toFixed(1) : 0.0;
                $('#average_rating').text(averageRating);
            }

            // Update the progress bar for each rating level
            function updateProgressBar(rating, percentage) {
                $('.progress-bar[data-rating="' + rating + '"]').css('width', percentage + '%');
                $('.progress-bar[data-rating="' + rating + '"]').attr('aria-valuenow', percentage);
                $('.progress-bar[data-rating="' + rating + '"]').find('.progress-label-right').text(percentage + '%');
            }

            // Update individual ratings and progress bars
            function updateRatings() {
                $('.review-item').each(function() {
                    var rating = $(this).find('.individual-rating').text();
                    var percentage = $(this).find('.individual-rating-percentage').text();
                    updateProgressBar(rating, percentage);
                });
            }

            // Load initial ratings and reviews
            function loadRatingsAndReviews() {
                // Simulating the initial data
                var ratingsAndReviews = [
                    { username: 'John Doe', rating: '5', comment: 'Great product!', timestamp: '2023-05-28 10:00:00' },
                    { username: 'Jane Smith', rating: '4', comment: 'Good quality.', timestamp: '2023-05-27 12:30:00' },
                    { username: 'David Johnson', rating: '3', comment: 'Average product.', timestamp: '2023-05-26 15:45:00' }
                ];

                // Clear the existing reviews list
                $('#reviews_list').empty();

                // Iterate through ratings and reviews and append them to the list
                for (var i = 0; i < ratingsAndReviews.length; i++) {
                    var username = ratingsAndReviews[i].username;
                    var rating = ratingsAndReviews[i].rating;
                    var comment = ratingsAndReviews[i].comment;
                    var timestamp = ratingsAndReviews[i].timestamp;

                    var listItem = $('<li class="review-item mb-3"></li>');
                    var ratingSpan = $('<span class="individual-rating">' + rating + '</span>');
                    var percentageSpan = $('<span class="individual-rating-percentage">0%</span>');
                    var commentSpan = $('<span class="individual-comment">' + comment + '</span>');
                    var timestampSpan = $('<span class="text-muted"> - ' + timestamp + '</span>');

                    listItem.append(ratingSpan);
                    listItem.append(percentageSpan);
                    listItem.append(commentSpan);
                    listItem.append(timestampSpan);

                    $('#reviews_list').append(listItem);
                }

                updateAverageRating();
                updateRatings();
            }

            // Handle form submission
            $('#review_form').submit(function(event) {
                event.preventDefault();

                var username = $('#username').val();
                var rating = $('#rating').val();
                var comment = $('#comment').val();

                // Simulating the submission process
                var newReview = {
                    username: username,
                    rating: rating,
                    comment: comment,
                    timestamp: '2023-05-29 11:30:00'
                };

                // Clear form fields
                $('#username').val('');
                $('#rating').val('1');
                $('#comment').val('');

                // Update the ratings and reviews list
                var listItem = $('<li class="review-item mb-3"></li>');
                var ratingSpan = $('<span class="individual-rating">' + newReview.rating + '</span>');
                var percentageSpan = $('<span class="individual-rating-percentage">0%</span>');
                var commentSpan = $('<span class="individual-comment">' + newReview.comment + '</span>');
                var timestampSpan = $('<span class="text-muted"> - ' + newReview.timestamp + '</span>');

                listItem.append(ratingSpan);
                listItem.append(percentageSpan);
                listItem.append(commentSpan);
                listItem.append(timestampSpan);

                $('#reviews_list').prepend(listItem);

                updateAverageRating();
                updateRatings();
            });

            // Load initial ratings and reviews
            loadRatingsAndReviews();
        });
    </script>
</body>
</html>
