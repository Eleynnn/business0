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
