
		// fichier .js
$(document).ready(function()
{
		// Exercice vérification d'un formulaire en jQuery
	function verif() 
	{   
		var lenom = $("#nom").val();
	
		if (lenom == "")
		{			
			alert("Le nom doit être renseigné");
			return false;
		}
		
		var leprenom = $("#prenom").val();
		
		if (leprenom == "") 
		{
			alert("Le prénom doit être renseigné"); 
			return false;
		}
		
		var email = $("#email").val();
		
		if (email == "")
		{			
			alert("L'email doit être renseigné");
			return false;
		}
			
		var login = $("#login").val();
		
		if (login == "")
		{
			alert("L'identifiant doit être renseigné");
			return false;
		}
		
		var password = $("#password").val();
		
		if (password == "")
		{
			alert("Le champ mot de passe doit être renseigné");
			return false;
		}
	
		var passwordC = $("#passwordC").val();
		
		if (passwordC == "")
		{			
			alert("Le champ confirmer mot de passe doit être renseigné");
			return false;
		}
	
		document.forms[0].submit();
	}

	$("#btn_inscription").click(function(event) 
	{
		
		/* On doit bloquer l'èvènement par défaut avec l'instruction 
		 * ci-dessous
		 * 'event' est un objet nommé librement représentant l'évènement
		 */         
		event.preventDefault();

		// Appel de la fonction verif()
		verif();             
	}); 

	// Requête Ajax Catégories/sous-catégories sur les pages ajout de produit et modif produit  
	$("#categories").change(function() 
			{	
			    // On récupère la valeur cliquée dans le <select> 'categories' (value du <select>)
				var categories_id = $(this).val();				
				
				
				$.post({
					cache: false,
					url: CI_BASE_URL+"/categories/listesouscategories", // url du fichier PHP qui va exécuter la requête SQL (CI_BASE_URL => variable definie dans le fichier liste_categories.php
					data: { cat_id: categories_id }, // passe le paramètre 'id' au fichier PHP, qui va valoir la région cliquée 
					dataType: "json", // on indique que le fichier est du type "json"
					success: function(aSousCategories) // la variable 'aSousCategories' reçoit le json retourné par PHP (via json_encode) 
					{			
									
						var contenu = ''; // on créé une chaîne vide nommée 'contenu'
						
						// 'each' est une boucle (équivalent d'un foreach en PHP)
						// lit ligne par ligne le JSON (une ligne = variable val)
						$.each(aSousCategories, function(key, val) 
						{		
		                    // on contruit pour chqe ligne le HTML d'un <option> du <select> 
		                    // avec les valeurs de la ligne JSON					
				            contenu += "<option value='"+val.cat_id+"'>"+val.cat_nom+"</option>\n";
				                  
				        });			
							
		                // une fois le JSON lu, on met à jour le HTML du <select> 'souscategories' avec les <option>
		                // construites pas le $.each 				
						$("#sousCategories").html(contenu);
						
					},	
					error: function (request, error) {
				        console.log(error);		
				        				
				    },
				});		
			});		
	
	
	
});