<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/front/devis-templates/style1.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/ficons@1.1.52/dist/ficons/font.css" rel="stylesheet">
    <title>Devis </title>
</head>
<body id="devisToPdf">
    <div class="header container">
        <img class="logo" src="{{asset('storage/img/logo1.JPG')}}" alt="logo">
        <div class="cantainer-title">
            <h4 class="title">FABRICANT DE SAC NON TISSÉ</h4>
            <h6 class="sous-title">SIDI MAAROUF 20520 CASABLANCA</h6>
        </div>
        <div class="container-date">
            <p class="fs-5 text text-date"> Le 27/10/2020 à Casablanca</p>
        </div>
    </div>
    <div class="container">
        <div class="cards">
            <div class="card mt-2 d-flex flex-row">
                    <p for="">A l’attention de la société :</p>
                    <p class="cardValue">HAPPY BAG</p>
            </div>
            <div class="card mt-2 d-flex flex-row m-auto" >
                <p for="">FACTURE PROFORMA FOB :</p>
                <p class="cardValue"> EXP-NC-202010-2701</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cards">
            <div class="card mt-2 d-flex flex-row">
                    <p for="">Adresse :</p>
                    <p class="cardValue">89, rue Charleroi 98800
                        Noumea Nouvelle Calédonie</p>
            </div>
            <div class="card mt-2 d-flex flex-row m-auto" >
                <p for="">Nom/Prénom du contact :</p>
                <p class="cardValue"> FOUAD HILALI </p>
            </div>
        </div>
    </div>
    <div class="container tableau">
        <table class="table table-bordered">
            <thead class="table-striped">
              <tr>
                <th scope="col">DESIGNATION</th>
                <th scope="col">Nombre de
                    sacs
                    par cartons</th>
                <th scope="col">Nombre Total
                    de Cartons</th>
                <th scope="col">Nombre Total
                    de sacs </th>
                <th scope="col">Prix unitaire
                    par Sac
                     (en €)
                    FOB </th>
                <th scope="col">Prix Unitaire
                    par colis
                     (en €)
                    FOB</th>
                <th scope="col">TOTAL
                    en (€)
                    FOB</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                
                <th scope="row">Sacs Anses 15 cm (TNT)Beige
                    Anses beiges Logo «ne pas.. »
                    H: 45 cm x L :50cm x S : 10 cm
                    (Hauteur x Largeur x Soufflet)
                    Grammage : 75 gr/m2
                    impression : Recto
                    nb couleurs d’impression :1</td>
                <td>225</td>
                <td>45</td>
                <td>10125</td>
                <td>0,17</td>
                <td>38.25</td>
                <td>1721,25</td>
              </tr>
              <tr>
                
                <th scope="row">Sacs Anses 15 cm (TNT)Beige
                    Anses beiges Logo «ne pas.. »
                    H: 45 cm x L :50cm x S : 10 cm
                    (Hauteur x Largeur x Soufflet)
                    Grammage : 75 gr/m2
                    impression : Recto
                    nb couleurs d’impression :1</td>
                <td>225</td>
                <td>45</td>
                <td>10125</td>
                <td>0,17</td>
                <td>38.25</td>
                <td>1721,25</td>
              </tr>
              <!-- <tr>
                
                <th scope="row">Sacs Anses 15 cm (TNT)Beige
                    Anses beiges Logo «ne pas.. »
                    H: 45 cm x L :50cm x S : 10 cm
                    (Hauteur x Largeur x Soufflet)
                    Grammage : 75 gr/m2
                    impression : Recto
                    nb couleurs d’impression :1</td>
                <td>225</td>
                <td>45</td>
                <td>10125</td>
                <td>0,17</td>
                <td>38.25</td>
                <td>1721,25</td>
              </tr> -->
            </tbody>
          </table>
    </div>
    <div class="footer container">
        <div class="infoBanc">
            <table class="table table-bordered container">
                <thead>
                    <th>
                        COORDONNÉES BANCAIRES
                    </th>
                </thead>
                <tbody>
                    <td>
                        <div class="infoContent infoContent-flex ">
                            <div class="logo_1"><img class="logo" src="{{asset('storage/img/logo1.JPG')}}" alt="logo"></div>
                            <div class="infoContent">
                                <div class="flex">
                                    <label for="">BANQUE: </label>
                                    <span> Attijariwafa Bank AGENCE: centre d’AFFAIRES MANDARONA</span>
                                </div>
                                <div class="flex">
                                    <label for="">ADRESSE: </label>
                                    <span> Angle Rue 1 et Bd 63, Lot. Attaoufik Sidi Maârouf CASABLANCA</span>
                                </div>
                                <div class="flex">
                                    <label for="">TEL: </label>
                                    <span> +212 522 279 090 / FAX : +212 522 296 298 </span>
                                </div>
                                <div class="flex">
                                    <label for="">RIB: </label>
                                    <span> 007 780 800 340 500 000 154 133 </span>
                                    <span class="separateur">|</span>
                                    <label for="">CODE SWIFT: </label>
                                    <span> BCMAMAMC </span>
                                </div>
                                <div class="flex">
                                    <label for="">IBAN: </label>
                                    <span> MA64007780800340500000154133 </span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tbody>
            </table>
        </div>
        <div class="infoComplimentaire">
            <span>RC 361813</span>
            <span>IF 20695015</span>
            <span>TP 36167873</span>
            <span>ICE : 001792926000012</span>
        </div>
        <div class="contact">
            <div class="contact-info">
                <div class="icon"><i class="fa-2x fa fa-map-marker"></i></div>
                <div class="info">
                    <span>LOT HAMZA N30 Appt 2</span>
                    <span>SIDI MAAROUF 20520 CASABLANCA</span>
                </div>
            </div>
            <div class="contact-info">
                <div class="icon"><i class="fa-2x fa fa-globe"></i></div>
                <div class="info">
                    <span>https://www.sacnontisse.com</span>
                </div>
            </div>
            <div class="contact-info">
                <div class="icon"><i class="fa-2x fa fa-phone"></i></div>
                <div class="info">
                    <span>+212 6 61 35 70 53</span>
                    <span>+ 31 9 70 44 84 47</span>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="/vendor/html2canvas/html2canvas.min.js"></script>
<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="/vendor/jspdf1.5.3/jspdf.debug.js"></script>
<script src="/js/admin/devis-jsPdf.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>