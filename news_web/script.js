function login(){
    var username = 'admin1'
    var password = 'password'

    var data = {
        username: username,
        password: password
    }

    //Send credentals
    var xhr = new XMLHttpRequest()
    xhr.open("POST", "login_sql.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4 && xhr.status === 200){
            console.log(xhr.responseText)
            var response = JSON.parse(xhr.responseText);
            if (response.success){
                window.location.href = "dashboard.html"
            }
            else{
                document.getElementById('message').innerHTML = response.message
            }
        }
    };
    var jsonData = JSON.stringify(data)
    xhr.send(jsonData);
}