$(document).ready(function(){

  // var myimage = document.getElementById("personimg");
  var mytitle = document.getElementById("ptitle");
  // var myfav = document.getElementById("pfav");

  // document.addEventListener('DOMContentLoaded', getPersonInfo, false)

  function reqListener () {
      console.log(this.responseText);
    }

    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        // reqListener();
        // var a = JSON.parse(this.responseText);
        // this.responseText = this.responseText.replace("Array", "");
        // this.responseText = this.responseText.replace("[", "");
        // this.responseText = this.responseText.replace("]", "");
        // this.responseText = this.responseText.replace("", "");
        // var answer = this.responseText.slice[];
        // console.log(this.responseText.length);
        // console.log(this.responseText.indexOf("Aditya"));
        console.log(this.responseText)
        var answer = "";
        for (i=54; i< this.responseText.length; i++)
        {
          if(this.responseText[i] != "\n")
          {
            var answer = answer + this.responseText[i];
          }
          else {
            break;
          }
          console.log(this.responseText[i])
        }
        console.log(answer);
        mytitle.textContent = answer;
        alert(this.responseText); //Will alert: 42
    };
    oReq.open("get", "Homepage.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();
    // reqListener();
    // console.log(mytitle.textContent);
})
