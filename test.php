<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yamli Translation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function(){
    $("#btnTranslate").click(function(){
        var word = $("#word").val();
        var url = "proxy.php?word=" + word + "&tool=api&account_id=000006&prot=https%3A&hostname=www.yamli.com&path=%2F&build=5515&sxhr_id=4";
        
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'text',
            success: function(response) {
                var dataArray = response.split("|");
                var firstElement = dataArray[0];
                var elem = getArabicText(String(firstElement));

                console.log("Translated word:", elem);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


function getArabicText(string) {
  let ar = [];

  string.split('').forEach(function(i) {
    if (/[\u0600-\u06FF]/.test(i)) {
      ar.push(i);
    }
  });

  return ar.join('');
}

    </script>
</head>
<body>
    <input type="text" id="word" placeholder="Enter word">
    <button id="btnTranslate">Translate</button>
</body>
</html>
