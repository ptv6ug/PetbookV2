function test() {
    alert("This is a JS test.")
}

function loginSetFocus() {
  document.getElementById("inputEmail").focus();
}

function createPostSetFocus() {
  document.getElementById("inputTitle").focus();
}  

function validateLogin() {
    var emailEntered = document.getElementById("inputEmail").value;
    var passwordEntered = document.getElementById("inputPassword").value;
    if ((emailEntered === "") | (passwordEntered === "")) {
            document.getElementById("loginErrorPlaceholder").textContent = "Username and/or password cannot be empty.";
    } else {
        /*alert("Page should redirect here.")*/
        window.location.href = "dashboard.html";
    }
}

var commentsCount1 = 0;
function addComment1() {
  var commentEntered = document.getElementById("inputComment").value;
  // Use insertRow(index) method to create an empty <tr> element and add it to the table
  // table_object.rows.length returns the number of <tr> elements in the collection
  var tableRef = document.getElementById("commentsTable1");
  var newRow = tableRef.insertRow(tableRef.rows.length);

  // Prepare content for each cell (or <td>) of the row
  var newCell = ""; 
  // Use insertCell(index) method to insert new cells (<td> elements) at the 1st position of the new <tr> element
  newCell = newRow.insertCell(0);            // specify which column (0)
  newCell.innerHTML = commentEntered;        // assign content  
  newCell.onmouseover = this.rowIndex;       // attach row index to the row
  var commentCounter1 = (x) => x+=1;
  document.getElementById("commentsCount1").innerHTML= commentCounter1(commentsCount1);
  commentsCount1 += 1;
  document.getElementById("inputComment").value = "";
}

var likes1 = 0;
function increaseLike1() {
  likes1 += 1;
  document.getElementById("likes1").innerHTML= likes1;
}

var likes2 = 0;
function increaseLike2() {
  likes2 += 1;
  document.getElementById("likes2").innerHTML= likes2;
}

var likes3 = 0;
function increaseLike3() {
  likes3 += 1;
  document.getElementById("likes3").innerHTML= likes3;
}
