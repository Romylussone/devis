//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
});




//Nombre d'envoie de badge par ecole
// select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_eb
// from actionsvisiteurs a
// inner join visites v on v.visiteID=a.visiteID
// inner join etablissements e on e.etablissementID=v.etablissementID
// where typeAction='envoie-badge' 
// GROUP by e.nomEtabli


//Nombre de brochure 
// select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_vv
// from actionsvisiteurs a
// inner join visites v on v.visiteID=a.visiteID
// inner join etablissements e on e.etablissementID=v.etablissementID
// where typeAction='visite-virtuelle' 
// GROUP by e.nomEtabli


//Nombre de brochure par ecole
// select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_brochure
// from actionsvisiteurs a
// inner join visites v on v.visiteID=a.visiteID
// inner join etablissements e on e.etablissementID=v.etablissementID
// where typeAction='brochure' 
// GROUP by e.nomEtabli 

// select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_vsw
// from actionsvisiteurs a
// inner join visites v on v.visiteID=a.visiteID
// inner join etablissements e on e.etablissementID=v.etablissementID
// where typeAction='site-web' 
// GROUP by e.nomEtabli 

// select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_drdv
// from actionsvisiteurs a
// inner join visites v on v.visiteID=a.visiteID
// inner join etablissements e on e.etablissementID=v.etablissementID
// where typeAction='demande-rdv' 
// GROUP by e.nomEtabli


