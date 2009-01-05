<div id="container"></div>


<script>

var div = document.getElementById('container');

var handleSuccess = function(o){
	YAHOO.log("The success handler was called; this transaction did not abort.  tId: " + o.tId + ".", "info", "example");

	if(o.responseText !== undefined){
		div.innerHTML += "<li>Transaction id: " + o.tId + "</li>";
		div.innerHTML += "<li>HTTP status: " + o.status + "</li>";
		div.innerHTML += "<li>Status code message: " + o.statusText + "</li>";
		div.innerHTML += "<li>HTTP headers: <ul>" + o.getAllResponseHeaders + "</ul></li>";
		div.innerHTML += "<li>Server response: " + o.responseText + "</li>";
		div.innerHTML += "<li>Argument object: Object ( [foo] => " + o.argument.foo +
						 " [bar] => " + o.argument.bar +" )</li><hr>";
	}
}

var handleFailure = function(o){
		YAHOO.log("The failure handler was called; this transaction aborted.  tId: " + o.tId + ".", "info", "example");

	div.innerHTML += "<li>Transaction id: " + o.tId + "</li>";
	div.innerHTML += "<li>HTTP status: " + o.status + "</li>";
	div.innerHTML += "<li>Status code message: " + o.statusText + "</li>";
}

var callback =
{
  success: handleSuccess,
  failure: handleFailure,
  argument: { foo:"foo", bar:"bar" },
  timeout: 1500
};

var sUrl = '<?php echo $assetsDirectory; ?>sync.php';

function makeRequest(){
	var obj1 = YAHOO.util.Connect.asyncRequest('GET', sUrl, callback);

	YAHOO.log("Initiating request; tId: " + obj1.tId + ".", "info", "example");

	var obj2 = YAHOO.util.Connect.asyncRequest('GET', sUrl, callback);

	YAHOO.log("Initiating request; tId: " + obj2.tId + ".", "info", "example");

}

YAHOO.log("As you interact with this example, relevant steps in the process will be logged here.", "info", "example");

</script>
<form><input type="button" value="Create Two Transactions" onClick="makeRequest();"></form>