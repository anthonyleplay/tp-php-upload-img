$(function () {
	/* 
	Il faut créer au préalable un élément de type <img class="preview" /> dans votre code html.
	Il vous permettra d'afficher l'aperçu de l'image.
	Vous allez pouvoir modifier la taille via un css respectif.
	Pensez également à mettre un data preview à votre input de type file : data-preview=".preview"
	*/

	$("input[data-preview]").change(function () {
		let input = $(this);
		let oFReader = new FileReader();
		oFReader.readAsDataURL(this.files[0]);
		oFReader.onload = function (oFREvent) {
			$(input.data('preview')).attr('src', oFREvent.target.result);
		};
	});
});
function playsound(){
	sound = new Audio("assets/x-files.wav");
    sound.play();
};