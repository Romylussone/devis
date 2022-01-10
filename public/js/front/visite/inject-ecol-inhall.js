var btnEcolesContainer = $("#ListeEcoleCollapse");
var btnEcoleF = $("#ListeEcoleCollapse button").first();
var urlGetEcole = $("#token").attr("get_ecole");
var passage = 0;


$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
})

   
//Après le chargement du hall on charge les ecoles de la db
$.ajax({
    url : urlGetEcole,
    method : "get",
}).done( function(response){
    var listEcol = jQuery.parseJSON(response);
    $.each(listEcol, function(k, v){

        //On clone le btn ecole par defaut
        copybtn = btnEcoleF.clone();
        copybtn.attr("id", v.nomEtabli);
        copybtn.attr("nomEcole", v.nomEtabli);
        copybtn.attr("lienVisite", v.lienVisiteEtabli);
        copybtn.attr("lienSite", v.sitewebEtabli);
        copybtn.attr("lienPdf", "");
        copybtn.attr("lienVideo", v.lienVideo);
        copybtn.attr("idEcole", v.etablissementID);
        copybtn.attr("fb_page_id", v.fb_page_id);
        copybtn.css("display", "");
        copybtn.html('<span class="badge badge-primary">'+(k+2)+'</span>' + '\n'+v.nomEtabli, 2, ' ', '...');

        if(passage == 0)
            btnEcolesContainer.append(copybtn);  
        else
            $("#ListeEcoleCollapse button").last().after(copybtn);

    })


}).fail( function(res) {
    

});

//Shoten words
function smartTrim(str, length, delim, appendix) {
    if (str.length <= length) return str;

    var trimmedStr = str.substr(0, length+delim.length);

    var lastDelimIndex = trimmedStr.lastIndexOf(delim);
    if (lastDelimIndex >= 0) trimmedStr = trimmedStr.substr(0, lastDelimIndex);

    if (trimmedStr) trimmedStr += appendix;
    return trimmedStr;
}
