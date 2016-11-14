
function iterate(other, depth) {
  if (!depth)
  {
    depth = 0;
  }
  //if it's an element node
  if (other.nodeType == 1)
    {
      var text = "";

      for (var i = 0; i < depth; i++) {
  			text += "-";
        //make the right number of dashes, depending if parent node or child node, etc
    }
    //concatenate the empty string, with the tagname of the element node
    text+= other.tagName +"\n";

    //Part 2 Function
    other.addEventListener('click', function() {alert(other.tagName)}, false);

    var children = other.childNodes;
    //get the childnodes of what you are currently looking at
    for (var j = 0, len = children.length; j < len; j++) {
        //run the same function again on the child nodes
        childtext = iterate(children[j], depth + 1);
        if (childtext!=null && childtext != "")
        {
          //concatenate text with the text you get from the children
          text+=childtext;
      }
    }
    return text;
  }
  else {
    return null;
  }
}

var list = document.getElementsByTagName("html")[0];

var returntext = iterate(list);
document.getElementById('info').innerHTML = returntext;


//part 3a function
//get all elements that have the class "quote"
var itm = document.getElementsByClassName("quote")[0];
var cln = itm.cloneNode(true);
//clone the elements

cln.innerHTML = "The best preparation for tomorrow is doing your best today.";
//add the quote to the clone

document.body.appendChild(cln);
//append the quote to the body of the html document

//part 3b function

//get all the elements that have a div
var alldivs = document.getElementsByTagName("div");

//loop through these elements
for (var i = 0; alldivs.length; i++)
{
  //add the appropriate mouseover and mouseout functions
  //used var cssChange to store the changes that should happen when you mouseover/mouseout
  alldivs[i].addEventListener("mouseover", function() {var cssChange = "background-color:red; padding-left: 10px;"; this.style.cssText = cssChange; }, false);
  alldivs[i].addEventListener("mouseout", function () {var cssChange = ""; this.style.cssText = cssChange;}, false);
}
