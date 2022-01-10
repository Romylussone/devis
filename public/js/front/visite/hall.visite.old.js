$(document).ready(function(e)
{
    var callAssistante = $("#call-assistant");
    var AssistantePanel = $("#assistant-panel");
    var AssistanteClose = $("#assistant-close");
    var OptionVisiteAssistante = $("#assistante-option-visite");
    var AssistanteVisiteRapide = $("#assistante-visite-rapide");
    var AssistanteMessages = $("#assistant-messages");
    var animTools = $(".animTool");
    var settingTool = $("#sceneListToggle");
    var sceneHeader = $("#sceneHeader");
    var toolNav = $("#toolNav");
    var currentSchool;
    var currentSchoolId;
    
    var callConseille = $("#call-conseille"); 
    var blockConseille = $("#block-conseille");

    var btnConseilFerme = $("#btnConseilFerme");
    var btnConseilMessage = $("#btnConseilMessage");
    var btnConseilRdv = $("#btnConseilRdv");
    var btnConseilVisite = $("#btnConseilVisite");
    var btnConseilHome = $("#btnConseilHome");
    var btnYoutube = $("#btnYoutube");
    var btnConseilBadge = $("#btnConseilFerme");
    var btnConseilTelecharger = $("#btnConseilTelecharger");
    var ListeEcolePanel = $("#ListeEcolePanel");

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    $(".form_datetime").datetimepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayBtn: true,
        initialDate : new Date().getDate(),
        minuteStep: 30,
        language:"fr",
        pickerPosition : "top-right",
        minView : 2
    });

    // click sur la porte de sortie du conseill
    $(".link-hotspot").click(function()
    {
      if($("#hall").hasClass("current"))
      {
        $("#hall").trigger("click");
      }
    });

    btnYoutube.click(function()
    {
      if($("#video-presentation").css('display') == 'none' || $("#video-presentation").css("visibility") == "hidden")
      {       
        // remove calendar rdv
        $("#video-presentation iframe").attr("src",currentSchool.attr("lienVideo"));
        $("#date-rdv").hide("fast",function() 
        {
          $("#video-presentation").show("slow");
        });   
      }
      else
      {
        $("#video-presentation iframe").attr("src","");
        $("#video-presentation").hide("fast");
      }
    });
    
    btnConseilRdv.on('click', function(e)
    {
      //Quand le visiteur est anonyme, on ajoute la classe btnConseilcon pour obliger le visiteur à s'inscrire ou se connecter 
      //Dans ce contexte on affiche la modal d'inscription
      if(!$(this).hasClass("btnConseilcon"))
      {
        if($("#date-rdv").css('display') == 'none' || $("#date-rdv").css("visibility") == "hidden")
        {  
          $("#video-presentation iframe").attr("src","");
          $("#video-presentation").hide("fast",
          function(e)
          {
            $("#date-rdv").show("slow");                  
          });
        }
        else
        {        
          $("#date-rdv").hide("fast");     
        }
      }
      
    });
    
    btnConseilFerme.click(function () 
    {      
      $("#video-presentation iframe").attr("src","");
      $("#video-presentation").hide("fast");

      $("#date-rdv").hide("fast");

      $('[tooltip="true"]').each(function () 
      {
        $(this).attr("tooltip","false");
      });
      
      // enable tooltip
      $('[tooltip="true"]').tooltip();
        
      blockConseille.animate({opacity:"toggle",display:"none"},300);
    });

    callConseille.click(function () 
    {
      $('[tooltip="true"]').each(function () 
        {
          $(this).attr("tooltip","false");
        });
        
        // enable tooltip
        $('[tooltip="true"]').tooltip();

      blockConseille.animate({opacity:"toggle",display:"none"},300);

      $("#video-presentation iframe").attr("src","");
      $("#video-presentation").hide("fast");
      $("#date-rdv").hide("fast");

    });

    // Au Téléchargement de la brochure
    btnConseilTelecharger.click(function () {
      
      var textWrapper2 = document.querySelector('.anT2');                    
          textWrapper2.innerHTML = "Merci d'avoir consulter la brochure de notre établissement.";
          textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

            var animtext1 = anime.timeline()
                        .add({
                              targets: '.anT2 .letter',
                              scale: [4,1],
                              opacity: [0,1],
                              translateZ: 0,
                              easing: "easeOutExpo",
                              duration: 950,
                              delay: (el, i) => 70*i
                        });
    });

    // Gestion des évènements d'initialisation de la partie Conseiller
    var conselle = function()
    { 
      // Affichage du Bouton du Hall
      $("#hall-container").css("display","inherit");  

      // Gestion des boutons en fonctions du choix d'école     
      ListeEcolePanel.css("display","none");
      btnConseilVisite.attr("href",currentSchool.attr("lienVisite"));
      btnConseilHome.attr("href",currentSchool.attr("lienSite"));
      btnConseilTelecharger.attr("href",currentSchool.attr("lienPdf"));

      $('[tooltip="false"]').each(function () 
      {
        $(this).attr("tooltip","true");
      })
      
      // enable tooltip
      $('[tooltip="true"]').tooltip();

      callConseille.animate({opacity:1,display:"default"},1000,function(){});

      // if(OptionVisiteAssistante.attr("state") == "show") 
      // {
      //   OptionVisiteAssistante.trigger("click"); 
      // } 
      $(".anT2").css("opacity","0");
      setTimeout(() => {
                // animation du text2 !!
                $(".anT2").animate({
                  opacity:1
                },0
                ,function()
                  {           

                    var textWrapper2 = document.querySelector('.anT2');                    
                    textWrapper2.innerHTML = "Bienvenu dans le Bureau du Conseiller de l'école <strong> " + currentSchool.attr("nomEcole") + "</strong>";
                    textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

                    var animtext1 = anime.timeline()
                                .add({
                                      targets: '.anT2 .letter',
                                      scale: [4,1],
                                      opacity: [0,1],
                                      translateZ: 0,
                                      easing: "easeOutExpo",
                                      duration: 950,
                                      delay: (el, i) => 70*i,
                                      complete : function()
                                      {
                                        textWrapper2.innerHTML = "Vous pouvez télécharger la brochure,visiter,";
                                        textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

                                        anime.timeline().add({
                                                targets: '.anT2 .letter',
                                                scale: [4,1],
                                                opacity: [0,1],
                                                translateZ: 0,
                                                easing: "easeOutExpo",
                                                duration: 950,
                                                delay: (el, i) => 70*i,
                                                complete:function()
                                                {   
                                                  
                                                  textWrapper2.innerHTML = " ou écrire au Conseiller de l'école.";
                                                  textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

                                                  anime.timeline().add({
                                                    targets: '.anT2 .letter',
                                                    scale: [4,1],
                                                    opacity: [0,1],
                                                    translateZ: 0,
                                                    easing: "easeOutExpo",
                                                    duration: 950,
                                                    delay: (el, i) => 70*i,
                                                    complete:function()
                                                    {
                                                                                                        
                                                      if(OptionVisiteAssistante.attr("state") == "hide") 
                                                      {
                                                        OptionVisiteAssistante.trigger("click"); 
                                                      } 
                                                      
                                                      blockConseille.css("opacity","1");
                                                      blockConseille.css("display","block");
                                                      btnYoutube.trigger("click");                                                       
                                                    }
                                                  });
                                                }
                                        });
                                      }
                                  })                    
                  });

              }, 2000);
    }

    $("#ESSEM").click(function()
    {
      currentSchool = $(this);                                                                  
      conselle();
    });


    // Click pour retourner au Hall
    $("#hall").click(function () 
    {
        $('[tooltip]').each(function () 
        {
          $(this).attr("tooltip","false");
        })
        
        // enable tooltip
        $('[tooltip]').tooltip("disable");
        
        // Affichage du Bouton du Hall
        $("#hall-container").css("display","none");  

        ListeEcolePanel.css("display","inherit");
        callConseille.animate({opacity:0,display:"none"},500);
        blockConseille.animate({opacity:0,display:"none"},500);
        $("#video-presentation iframe").attr("src","");
        $("#video-presentation").hide("fast");

        $("#date-rdv").hide("fast");

        var textWrapper2 = document.querySelector('.anT2');
        textWrapper2.innerHTML = "Vous pouvez en tout temps consulter les Conseillers de nos écoles partenaires";
        textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

        anime.timeline().add({ 
          targets: '.anT2 .letter',
          scale: [4,1],
          opacity: [0,1],
          translateZ: 0,
          easing: "easeOutExpo",
          duration: 950,
          delay: (el, i) => 70*i,
          complete: function()
          {
              textWrapper2.innerHTML = "En choisissant une école dans la liste.";
              textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");
              anime.timeline().add({ 
                        targets: '.anT2 .letter',
                        scale: [4,1],
                        opacity: [0,1],
                        translateZ: 0,
                        easing: "easeOutExpo",
                        duration: 950,
                        delay: (el, i) => 70*i
              });
          }
        });
    });



    // Appparition des éléments de la visite
    setTimeout(() => 
    {
      sceneHeader.animate({
            opacity:1
          },1000);
          toolNav.animate({
            opacity:1
          },1000);
    }, 1000);
    
    

    // Lancement de l'assitante
    setTimeout(() => {      
      AssistantePanel.css("display","block");

          AssistantePanel.animate(
          {
            opacity: 1,
          }
          , 1000
          , 
          function() 
          {               
              // animation du text1 !!
              $(".anT1").animate({
                opacity:1
              },0,function()
                {                   
                  var textWrapper1 = document.querySelector('.anT1');
                  textWrapper1.innerHTML = textWrapper1.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

                  var animtext1 = anime.timeline()
                              .add({
                                    targets: '.anT1 .letter',
                                    scale: [4,1],
                                    opacity: [0,1],
                                    translateZ: 0,
                                    easing: "easeOutExpo",
                                    duration: 950,
                                    delay: (el, i) => 70*i
                                });

                });

              setTimeout(() => {
                // animation du text2 !!
                $(".anT2").animate({
                  opacity:1
                },0
                ,function()
                  {           
                    var textWrapper2 = document.querySelector('.anT2');
                    textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

                    var animtext1 = anime.timeline()
                                .add({
                                      targets: '.anT2 .letter',
                                      scale: [4,1],
                                      opacity: [0,1],
                                      translateZ: 0,
                                      easing: "easeOutExpo",
                                      duration: 950,
                                      delay: (el, i) => 70*i,
                                      complete : function()
                                      {
                                          // On retire le text de bienvenu
                                          $(".anT1").hide("fast");

                                          textWrapper2.innerHTML = "Choisissez une école pour commencer la visite.";
                                          textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter' style='opacity:0;' >$&</span>");

                                          anime.timeline().add({ 
                                            targets: '.anT2 .letter',
                                            scale: [4,1],
                                            opacity: [0,1],
                                            translateZ: 0,
                                            easing: "easeOutExpo",
                                            duration: 950,
                                            delay: (el, i) => 70*i,
                                            complete:function()
                                            {                                                     
                                              if(OptionVisiteAssistante.attr("state") == "hide") 
                                              {
                                                OptionVisiteAssistante.trigger("click"); 
                                              }   
                                            }
                                          })
                                      }
                                  })                    
                  });

              }, 2000);

            });
          
    }, 2000);


    animTools.each(function(e)
    {
      $(this).mouseover(function()
      {
        if($(this).hasClass("SetToolAnim") == false)
        {
          $(this).addClass("SetToolAnim");
        }
      });

      $(this).mouseleave(function()
      {
        if($(this).hasClass("SetToolAnim") == true)
        {
          $(this).removeClass("SetToolAnim");
        }
      });
    });

    settingTool.click(function(e)
    {
      toolNav.animate({
              opacity: "toggle",
            }, 1000, function() { });
      
      sceneHeader.animate({
              opacity: "toggle",
            }, 1000, function() { });
    });

    callAssistante.click(function(e)
    {
        if(AssistantePanel.css("display") != "none")
        {
          AssistantePanel.animate({
              opacity: 0,
            }, 1000, function() {               
              AssistantePanel.css("display","none");
            });
        }
        else
        {
          AssistantePanel.css("display","block");
          AssistantePanel.animate({
              opacity: 1,
            }, 1000, function() {               
              // do nothing now

            });
        }
    });

    AssistanteClose.click(function(e) 
    {        
      AssistantePanel.animate({
              opacity: 0,
            }, 1000, function() {               
              AssistantePanel.css("display","none");
            });
    });

    OptionVisiteAssistante.click(function(e)
    {  
      if($(this).attr("state") == "hide") 
      {
        AssistantePanel.animate({
                width: "90%",
              }, 1000, function() {               
                // AssistantePanel.css("display","none");
                OptionVisiteAssistante.attr("state","show");
              });

        AssistanteMessages.animate({
                opacity:0,
              }, 100, function() {    
                AssistanteMessages.removeClass("col-md-12");      
                AssistanteMessages.addClass("col-md-6");      

                AssistanteVisiteRapide.css("display","block");
                AssistanteVisiteRapide.animate({ 
                        opacity:1, 
                      },1000,function()
                      {
                        AssistanteMessages.animate({
                        opacity:1,
                          }, 1000, function() {          
                          });

                      }); 
              });
      }     
      else
      {
        AssistantePanel.animate({
                width: "60%",
              }, 1000, function() {               
                // AssistantePanel.css("display","none");
                OptionVisiteAssistante.attr("state","hide");
                
              });

        AssistanteMessages.animate({
                opacity:0,
              }, 100, function() { 
                AssistanteVisiteRapide.animate({ 
                opacity:0, 
                  },1000,function()
                  {
                    AssistanteMessages.removeClass("col-md-6");      
                    AssistanteMessages.addClass("col-md-12");                 
                    AssistanteVisiteRapide.css("display","none");
                    AssistanteMessages.animate({
                    opacity:1,
                      }, 1000, function() {          
                      });
                  });                 
          });                    
      }

    });

    // enable tooltip
    $('[tooltip="true"]').tooltip();
});