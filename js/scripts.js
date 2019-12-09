
// Post comments section hidden then slideToggle
$(".post .post-footer").toggle();

$(".comment-control").click(function(event) {
    console.log('.post_'+this.id+' .post-footer');
    $('#post_'+this.id+' .post-footer').slideToggle(500);
});

// Post textarea expanding automatically on input

var newpostText = document.getElementById("newpost-text");
var heightLimit = 200; /* Maximum height: 200px */

newpostText.oninput = function() {
  newpostText.style.height = ""; /* Reset the height */
  newpostText.style.height = Math.min(newpostText.scrollHeight, heightLimit) + "px";
};
