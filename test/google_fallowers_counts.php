<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
//var profileid = '108555427327576574121';
//var apikey = 'AIzaSyDAgmvGU44fGlikn3sCY4kH4CR2huuEUD4';

var profileid ='112040370486830341550';
var apikey = 'AIzaSyAsfoe_1itV23fdayU82iFeSyLo1v-FR48';

/*var profileid = '110700693786942896145';
var apikey = 'AIzaSyAqlZ1MJSGXMSs8q5WbfvLpZTGJeHLVc2w';*/

var url = 'https://www.googleapis.com/plus/v1/people/' + profileid + '?key=' + apikey;
$.ajax({
type: "GET",
dataType: "json",
url: url,
success: function (data) {
var googlefollowcount = data.circledByCount;
$(".googlefollowercount").html(googlefollowcount);
}
});
</script>
</head>

<body>

<span class='googlefollowercount'></span>

</body>
</html>