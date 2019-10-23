$(document).ready(function() 
			{
		
$("#categories").change(function() 
			{	
			    // On récupère la valeur cliquée dans le <select> 'categories' (value du <select>)
				var categories = $(this).val();				
				
				
				$.post({
					cache: false,
					
					url: CI_BASE_URL+"/Categories/SousCategories", // url du fichier PHP qui va exécuter la requête SQL (CI_BASE_URL => variable definie dans le fichier liste_categories.php
					data: { cat_id: categories }, // passe le paramètre 'id' au fichier PHP, qui va valoir la région cliquée 
					dataType: "json ", // on indique que le fichier est du type "json"
					success: function(SousCategories) // la variable 'SousCategories' reçoit le json retourné par PHP (via json_encode) 
					{									

									
						var contenu = ''; // on créé une chaîne vide nommée 'contenu'
						
						// 'each' est une boucle (équivalent d'un foreach en PHP)
						// lit ligne par ligne le JSON (une ligne = variable val)
						$.each(SousCategories, function(key, val) 
						{									

		                    // on contruit pour chqe ligne le HTML d'un <option> du <select> 
		                    // avec les valeurs de la ligne JSON					
				            contenu += "<option value='"+val.cat_id+"'>"+val.cat_nom+"</option>\n";
				                  
				        });			
							
		                // une fois le JSON lu, on met à jour le HTML du <select> 'souscategories' avec les <option>
		                // construites pas le $.each 				
						$("#pro_cat_id").html(contenu);
						
					},	
				error: function (request, error) {
					console.log(error);		
				        				
				    },
				});		
			});		
	
			$('#chercher').keyup(function(){
				
			
			
			
			
			})
			
				
				
		
			
			
			
			
			
			});