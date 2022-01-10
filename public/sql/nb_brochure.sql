select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_brochure
from actionsvisiteurs a
inner join visites v on v.visiteID=a.visiteID
inner join etablissements e on e.etablissementID=v.etablissementID
where typeAction='brochure' 
GROUP by e.nomEtabli