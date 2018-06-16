//return 0 if nothing found, 1 if stuffs found, -1 for invalid input
function searchOctopaths() {
    var inputVal, table, tableRows, subjects, comment;
    var count = 0; //count hit octopaths

    //get input val as the search query
    inputVal = document.getElementById("search-field").value.toLowerCase();

    //get search subjects from elements with 'search-subject' class
    table = document.getElementById("octopath-table");
    tableRows = table.getElementsByTagName("tr");
    subjects = table.getElementsByClassName("search-subject");

    //get element for comment
    comment = document.getElementById("comment");

    //exception handling
    var invalidChars = /(^ )|[^a-z0-9!?\-_ \'\"#]/i;
    if( (result = inputVal.search(invalidChars)) != -1){ comment.innerHTML = "<i>Invalid search query detected: ' " + inputVal[result] + " '</i>"; return -1; }

    //search given query with octopaths on table
    for(var i=0; i<subjects.length; i++) {
        subjects[i].innerHTML = cleanHtmlElement(subjects[i].innerHTML, "span"); //clean html content to enable search & clean format
        var subjectInnerContent = subjects[i].innerHTML.toLowerCase(); //retrieve html content in each individual subject
        if(subjectInnerContent.search(inputVal) != -1){ //remain the subject displayed and count
            tableRows[i].style.display = "";

            //add a tag to the matched part in innerHTML (to highlight it)
            var content = subjects[i].innerHTML;
            var head = subjectInnerContent.indexOf(inputVal);
            var formattedContent = content.slice(0, head) + "<span>" + content.slice(head, head+inputVal.length) + "</span>" + content.slice(head+inputVal.length);
            subjects[i].innerHTML = formattedContent;
            
            count++;
        }
        else{ //hide the subject from the table
            tableRows[i].style.display = "none";
        }
    }

    //set/remote comment content depending on the hit octopaths number
    if(count == 0){ comment.innerHTML = "<i>No relevant Octopaths found</i>"; return 0; }
    else comment.innerHTML = "";

    return 1;
}

function cleanHtmlElement(content, tag){
    content = content.replace("<"+tag+">", "");
    content = content.replace("</"+tag+">", "");

    return content;
}