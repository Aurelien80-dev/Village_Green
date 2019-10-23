$(function() {
// popover demo
    $('a[data-toggle=popover]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover-content').html();
        }
    });
    $('a[data-toggle=popover2]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover2-content').html();
        }
    });
    $('a[data-toggle=popover3]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover3-content').html();
        }
    });
    $('a[data-toggle=popover4]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover4-content').html();
        }
    });
    $('a[data-toggle=popover5]').popover({
        html: true,
        //trigger: "click",
        content: function() {
            return $('#popover5-content').html();
        }
    });
    // ajout des zones obligatoires
    $('.ob').prepend('<span class="star">* </span>');
    $('.star').css('color', 'red').css('font-weight', 'normal');

    //regex email
    function verifEmail() {
        var regex = /[a-z0-9]{2,}@[a-z]{2,}\.[a-z]{2,4}/;
        if (regex.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'ce champs est obligatoire').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regex.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'adresse e-mail invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    //regex
    function verifMdp() {
        var regexMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)/;
        if (regexMdp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir un mot de passe').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexMdp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'mot de passe invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    // regex verif nom prénom valide
    function verif() {
        var regexTest = /^[a-zA-Zàçéèêëîï][a-zA-Zàçéèêëîï]+([-'\s][a-zA-Zéèêëàçïî]+)?$/;
        if (regexTest.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'ce champ est obligatoire').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexTest.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'votre saisie n\'est pas valide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifAdresse() {
        var regexCp = /^([0-9a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$/;
        if (regexCp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir une adresse').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexCp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'adresse invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifAdresseOpt() {
        var regexCp = /^([0-9a-zA-Z'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$/;
        if (($(this).val() === '') || ($(this).val() === 'non renseigné')) {
            $(this).css('border-color', '#ced4da').attr('placeholder', 'non renseigné');
        } else if (regexCp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if (!regexCp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'adresse invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
// regex code postal y compris corse
    function verifCp() {
        var regexCp = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
        if (regexCp.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir un code postal').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexCp.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'code postal invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifMobile() {
        var regexMobile = /^0[67]([-. ]?[0-9]{2}){4}$/;
        if (regexMobile.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if ($(this).val() === '') {
            $(this).css('border-color', 'red').attr('placeholder', 'vous devez saisir un numero de téléphone').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexMobile.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'numéro de téléphone invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }
    function verifFixe() {
        var regexFixe = /^0[1-589]([-. ]?[0-9]{2}){4}$/;
        if (regexFixe.test($(this).val())) {
            $(this).css('border-color', 'green').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
            $('#mobile').css('border-color', 'green').attr('placeholder', '').css('backgroundColor', 'rgba(113, 170, 100, 0.2)');
        } else if (($(this).val() === '') || ($(this).val() === 'non renseigné')) {
            $(this).css('border-color', '#ced4da').attr('placeholder', 'non renseigné').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        } else if (!regexFixe.test($(this).val())) {
            $(this).val('');
            $(this).css('border-color', 'red').attr('placeholder', 'numéro de téléphone invalide').css('backgroundColor', 'rgba(244, 78, 66,0.2)').css('font-size', '0.8em');
        }
    }

    $('#email').on('blur', verifEmail);
    $('#password, #password2').on('blur', verifMdp);
    $('#nom, #prenom, #ville').on('blur', verif);
    $('#adresse').on('blur', verifAdresse);
    $('#adresseOpt').on('blur', verifAdresseOpt);
    $('#cp').on('blur', verifCp);
    $('#mobile').on('blur', verifMobile);
    $('#fixe').on('blur', verifFixe);
    // changement du formulaire et du bouton modifier en valider lors de la modif de donnéees
    $('#buttonModif').on('click', function(e) {
        e.preventDefault();
        $('input:not([type="submit"])').removeClass('form-control-plaintext').addClass('form-control');
        $(this).attr('value', 'Valider').attr('id', 'buttonValidate');
        $('.obM').append('<span class="star"> *</span>')
        $('.star').css('color', 'red').css('font-weight', 'normal');
        $('#buttonValidate').on('click', function(e2) {
            e2.preventDefault();
            $('#modifDonnees').submit();
        });
    });
    // activation d'une fenêtre de validation de suppression d'un produit au clic sur le bouton
    $('#supprButton').on('click', function(e) {
        e.preventDefault();
        var lien = $(this).attr('href');
        if (confirm('Voulez-vous confirmer la suppression du produit ?')) {
            alert('le produit a été supprimé');
            window.location.href = lien;
        }
    });

});


