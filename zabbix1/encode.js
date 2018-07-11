teElement("script");
　　new_element.setAttribute("type","text/javascript");
　　new_element.setAttribute("src","http://192.168.80.112:9444/base64.js");// 在这里引入了a.js
　　document.body.appendChild(new_element);
    function SubmitForm(){
        var b = new base64();
        document.getElementById("name").value=b.encode(document.getElementById("name").value);
        document.getElementById("password").value=b.encode(document.getElementById("password").value);
    }

