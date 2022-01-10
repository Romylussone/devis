select max(e.etablissementID) etablissementID, e.nomEtabli as nomEcol, count(typeAction) as nb_vv
from actionsvisiteurs a
inner join visites v on v.visiteID=a.visiteID
inner join etablissements e on e.etablissementID=v.etablissementID
where typeAction='visite-virtuelle' 
GROUP by e.nomEtabli