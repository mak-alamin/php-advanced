const search = document.getElementById("search");

search.addEventListener("keyup", function(){
    const users_name = document.querySelectorAll(".user_name");
    const xhttp = new XMLHttpRequest();

    var input_str = this.value.toLowerCase();
    
    xhttp.onload = function(){
        var users = JSON.parse(this.responseText);
        

        // users.forEach((user, i) => {
        //     let user_name = user.name.toLowerCase();
        // });


        users_name.forEach((userName, i) => {
            if (input_str == '') {
                userName.parentElement.style.display = 'block';
                return;
            }

            if ( ! userName.innerHTML.toLocaleLowerCase().includes(input_str)) {

                userName.parentElement.style.display = 'none';
            } else {
                
                userName.parentElement.style.display = 'block';
            }
            
        });

    }
    
    xhttp.open("GET", "../Controllers/Admin/AdminAjax.php", true);
    xhttp.send();
});