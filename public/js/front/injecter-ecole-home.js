//Configuration global de ajax
var urlGetEcole = $("#ecole-section").attr("url_get");
var ecolesContainer = $("#indexEcoleContainer");
var divEcolTemplate = $("#indexEcoleContainer div").first();
var passage = 0;
var copydiv = divEcolTemplate.clone();
var divtmp = $("<div></div>");

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
})

$(document).ready(function() {
   
    //Après le chargement de la page index on charge les ecoles de la db
    $.ajax({
        url : urlGetEcole,
        method : "get",
    }).done( function(response){
        var listEcol = jQuery.parseJSON(response);

        $.each(listEcol, function(k, v){

            if(v.cheminImghome == "")
            {
                copydiv.find("div.imgEcol img").attr("src", ".\\img\\ecole\\default-ecole.jpg");
            }
            else {
                copydiv.find("div.imgEcol img").attr("src", v.cheminImghome);
            }
            copydiv.find("h4.nom-ecol-abreger").text(v.nomEtabli);
            copydiv.find("p.nomEcol").text(v.nomCompletEtabli);
            copydiv.css("display", "");
            copydiv.find("a.lienvisiteEcol")
                .attr("href",v.sitewebEtabli)
                .html('visiter le site <i class="fas fa-globe"></i> ');
            ;

            console.log(v.cheminImghome);
            
            if(passage == 0)
                ecolesContainer.append(copydiv);        
            else
                $("#indexEcoleContainer div").last().after(copydiv);


            copydiv = $("#indexEcoleContainer div").first().clone();

        })

        // ecolesContainer.append(divEcolTemplate);

        // {"etablissementID":1,"nomEtabli":"ESSEM","nomCompletEtabli":"L'Ecole Sup\u00e9rieure des Sciences Economiques et de Management de Casablanca.",
        // "sitewebEtabli":"https:\/\/www.essem-bs.com","lienVisiteEtabli":"https:\/\/my.matterport.com\/show\/?m=2TnLXETMUkP",
        // "lienVideo":"https:\/\/www.youtube.com\/embed\/N-lsn_I6aAI?autoplay=1&mute=0","fb_page_id":"104357908459359",
        // "email_etabli":"ecoletestec@gmail.com","cheminImghome":"","published":1,"updated_at":null,
        // "created_at":"-000001-11-30T00:00:00.000000Z"},
    

    }).fail( function(res) {
     

    });
});