// let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

// function setup(){
//     console.log("Proba!");
//     const preferinte = document.querySelectorAll(".but");
//     for (let i = 0; i < preferinte.length; i++) {
//         preferinte[i].onclick = function(e) {
//             adaugapreferinta(e);
//         };
//     }
// }

// function adaugapreferinta(e) {
//     let prefe = e.target.closest('button').getAttribute('data-id');
//     if (!wishlist.find(element => element === prefe)) {
//         console.log("Preferinta: ", prefe);

//         // Salvăm preferința în localStorage
//         wishlist.push(prefe);
//         localStorage.setItem('wishlist', JSON.stringify(wishlist));
        
//         // Opțional: adăugăm vizual un efect că preferința a fost adăugată
//         e.target.closest('button').classList.add('added');
//     }
// }

// window.addEventListener("load", setup);

$(document).ready(function(){
    function incarcaPagina(pagina){
        $.ajax({
            url:'utilizatori.php',
            type:'GET',
            data:{  page:pagina },
            success:function(response)
            {
                var inregi=$('#inregistrari');
                var paginare=$('#pagination');
                inregi.empty();
                paginare.empty();

                response.datee.forEach(function(inregistrare) {
                    inregi.append('<tr><td>'+inregistrare.id+'</td><td>'+inregistrare.nume_utilizator+'</td><td>'+inregistrare.prenume_utilizator+'</td><td>'+inregistrare.parola+'</td><td>'+inregistrare.email+'</td><td>'+inregistrare.mobil+'</td></tr>');
                });
                var nr_pag=Math.ceil(response.totale/response.nr_pag);
                var prevclass=page===1 ? 'disabled' : '';
                var nextclass=page===nr_pag ? 'diabled' : '';

                paginare.append('<li class="page-item"'+ prevClass +'"<a class="page-link" href="#" aria-label="Previous" data-page="' + (page - 1) + '"><span aria-hidden="true">&laquo;</span></a></li>');

                for (var i=1;i <=nr_pag;i++){
                    var activeClass = page === i ? 'active' : '';
                    paginare.append('<li class="page-item '+activeClass+'"><a class="page-item" href="#" data-page="' + i +'">'+i+'</a></li>');
                }
                paginare.append('<li class="page-item '+ nextclass +'"><a class="page-link" href="#" aria-label="Next" data-page="' +(pagina+1)+ '"><span aria-hidden="true">&raquo;</span></a></li>');
            },
            error: function(xhr, status, error) {
                console.error('Eroare la încărcarea datelor: ' + error);
            }
        });
    }
    $('#pagination').on('click','a', function(e)
{
    e.preventDefault();
    var pagina=$(this).data('pagina');
    if (!$(this).parent().hasClass('disabled') && !$(this).parent().hasClass('active')) {
        loadPage(page);}
});
loadPage(1);
});