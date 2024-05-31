document.addEventListener("DOMContentLoaded", function() {
    cameraManager();
    // Fetch provinces and populate the select element
    fetch("/provinces")
        .then((response) => response.json())
        .then((data) => {
            let provinceSelect = document.getElementById("province_id");
            provinceSelect.innerHTML =
                '<option value="" selected hidden>Sélectionner une province</option>';
            data.forEach((province) => {
                let option = document.createElement("option");
                option.value = province.id;
                option.textContent = province.province_libelle;
                provinceSelect.appendChild(option);
            });
        });

    // Show/Hide the section based on marital status
    document.querySelectorAll('input[name="etat_civil"]').forEach((input) => {
        input.addEventListener("change", function() {
            let conjointsSection = document.getElementById("conjoints-section");
            if (this.value === "marié") {
                conjointsSection.classList.remove("d-none");
                document
                    .getElementById("famille-charges-section")
                    .classList.remove("d-none");
                document
                    .getElementById("enfants-section")
                    .classList.remove("d-none");
            } else if (this.value === "divorcé" || this.value === "veuf") {
                conjointsSection.classList.add("d-none");
                document
                    .getElementById("famille-charges-section")
                    .classList.remove("d-none");
                document
                    .getElementById("enfants-section")
                    .classList.remove("d-none");
            } else {
                conjointsSection.classList.add("d-none");
                document
                    .getElementById("famille-charges-section")
                    .classList.add("d-none");
                document
                    .getElementById("enfants-section")
                    .classList.add("d-none");
            }
        });
    });

    // Add dynamic children input fields
    let enfantIndex = 1;
    document
        .getElementById("add-enfant")
        .addEventListener("click", function() {
            const enfantGroup = `
            <div class="enfant-group border p-3 mb-3 section-group">
            <button class="clean-btn" type="button">
                <i class="icon-trash-2"></i>
            </button>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="enfant_nom">Nom de l'Enfant</label>
                        <input type="text" placeholder="entrez le nom complet de l'enfant..." class="form-control" name="enfants[${enfantIndex}][eft_nom]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="enfant_date_naissance">Date de Naissance de l'Enfant</label>
                        <input type="date" class="form-control" name="enfants[${enfantIndex}][eft_date_naissance]" required>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-enfant"><i class="icon-plus-1"></i> Ajouter un Enfant</button>
            `;
            document
                .getElementById("enfants-section")
                .insertAdjacentHTML("beforeend", enfantGroup);
            enfantIndex++;
        });

    // Add dynamic family members input fields
    let familleChargeIndex = 1;
    document
        .getElementById("add-famille-charge")
        .addEventListener("click", function() {
            const familleChargeGroup = `
            <div class="famille-charge-group border p-3 mb-3 section-group">
                <button class="clean-btn" type="button">
                    <i class="icon-trash-2"></i>
                </button>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="famille_nom">Nom du Membre</label>
                        <input type="text" placeholder="entrez le nom du membre de la famille..." class="form-control" name="famille_charges[${familleChargeIndex}][nom_membre_famille]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="famille_lien">Lien de Parenté</label>
                        <input type="text" placeholder="entrez lien parental..."  class="form-control" name="famille_charges[${familleChargeIndex}][lien_parent]" required>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-famille-charge"><i class="icon-plus-1"></i> Ajouter un Membre de la Famille</button>
            `;
            document
                .getElementById("famille-charges-section")
                .insertAdjacentHTML("beforeend", familleChargeGroup);
            familleChargeIndex++;
        });

    // Add dynamic academic titles input fields
    let etudeTitreIndex = 1;
    document
        .getElementById("add-etude-titre")
        .addEventListener("click", function() {
            const etudeTitreGroup = `
            <div class="etude-titre-group border p-3 mb-3 section-group">
            <button class="clean-btn" type="button">
                <i class="icon-trash-2"></i>
            </button>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titre_libelle">Libellé du Titre</label>
                        <input type="text" placeholder="entrez le libellé du titre..." class="form-control" name="etude_titres[${etudeTitreIndex}][titre_libelle]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titre_date_obtention">Date d'Obtention</label>
                        <input type="date" class="form-control" name="etude_titres[${etudeTitreIndex}][titre_date_obtention]" required>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-etude-titre"> <i class="icon-plus-1"></i> Ajouter un Titre Académique</button>
            `;
            document
                .getElementById("etudes-section")
                .insertAdjacentHTML("beforeend", etudeTitreGroup);
            etudeTitreIndex++;
        });

    // Load dynamic options for territories, sectors, and chiefdoms
    document
        .getElementById("province_id")
        .addEventListener("change", function() {
            const provinceId = this.value;
            fetch("/territoires?province_id=" + provinceId)
                .then((response) => response.json())
                .then((data) => {
                    let territoireSelect =
                        document.getElementById("territoire_id");
                    cleanSelect("territoire_id", "une territoire");
                    cleanSelect("secteur_id", "un secteur");
                    cleanSelect("chefferie_id", "une chefferie");
                    data.forEach((territoire) => {
                        let option = document.createElement("option");
                        option.value = territoire.id;
                        option.textContent = territoire.territoire_libelle;
                        territoireSelect.appendChild(option);
                    });
                });
        });

    document
        .getElementById("territoire_id")
        .addEventListener("change", function() {
            const territoireId = this.value;
            fetch("/secteurs?territoire_id=" + territoireId)
                .then((response) => response.json())
                .then((data) => {
                    let secteurSelect = document.getElementById("secteur_id");
                    cleanSelect("secteur_id", "un secteur");
                    cleanSelect("chefferie_id", "une chefferie");
                    data.forEach((secteur) => {
                        let option = document.createElement("option");
                        option.value = secteur.id;
                        option.textContent = secteur.secteur_libelle;
                        secteurSelect.appendChild(option);
                    });
                });
        });

    document
        .getElementById("secteur_id")
        .addEventListener("change", function() {
            const secteurId = this.value;
            fetch("/chefferies?secteur_id=" + secteurId)
                .then((response) => response.json())
                .then((data) => {
                    let chefferieSelect =
                        document.getElementById("chefferie_id");
                    cleanSelect("chefferie_id", "une chefferie");
                    data.forEach((chefferie) => {
                        let option = document.createElement("option");
                        option.value = chefferie.id;
                        option.textContent = chefferie.chefferie_libelle;
                        chefferieSelect.appendChild(option);
                    });
                });
        });
});

function cameraManager() {
    const photoPicker = document.getElementById("photo-picker");
    const videoPreview = document.getElementById("video-preview");
    const photoPreview = document.getElementById("photo-preview");
    const captureBtn = document.getElementById("capture-btn");
    const photoInput = document.getElementById("photo");
    let videoStream = null;
    let isCameraActive = false;
    const video = document.createElement("video");

    captureBtn.addEventListener("click", function() {
        if (!isCameraActive) {
            videoPreview.classList.remove("d-none");
            photoPreview.classList.add("d-none");
            captureBtn.innerHTML =
                '<i class="icon-camera-1 mr-1"></i>Faire capture';
            navigator.mediaDevices
                .getUserMedia({ video: true })
                .then(function(stream) {
                    videoStream = stream;
                    video.srcObject = stream;
                    video.play();
                    videoPreview.srcObject = stream;
                    isCameraActive = true;
                })
                .catch(function(error) {
                    console.error("Error accessing camera: ", error);
                });
        } else {
            captureBtn.innerHTML =
                '<i class="icon-camera-1 mr-1"></i>Lancer caméra';
            // Code pour capturer une image et l'affecter à photoInput
            let canvas = document.createElement("canvas");
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext("2d").drawImage(video, 0, 0);
            const imageDataURL = canvas.toDataURL("image/png");
            photoPreview.src = imageDataURL;
            const photoFile = dataURLtoBlob(imageDataURL); // Convertir l'URL de données en Blob

            // Créer un objet File à partir du Blob
            const fileOptions = { type: "image/png" };
            const photoBlob = new File([photoFile], "photo.png", fileOptions);

            // Créer un FileList contenant le File
            const fileList = new DataTransfer();
            fileList.items.add(photoBlob);

            // Affecter le FileList à l'input photo
            photoInput.files = fileList.files;

            // Arrêter la diffusion vidéo
            videoStream.getTracks().forEach((track) => track.stop());

            // Afficher l'image capturée
            photoPreview.classList.remove("d-none");
            videoPreview.classList.add("d-none");
            isCameraActive = false;
        }
    });

    photoInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            photoPreview.src = e.target.result;
            photoPreview.style.display = "block";
            videoPreview.style.display = "none";
            photoPreview.classList.remove("d-none");
            videoPreview.classList.add("d-none");
        };
        reader.readAsDataURL(file);
    });

    // Fonction utilitaire pour convertir une URL de données en Blob
    function dataURLtoBlob(dataURL) {
        const arr = dataURL.split(",");
        const mime = arr[0].match(/:(.*?);/)[1];
        const bstr = atob(arr[1]);
        let n = bstr.length;
        const u8arr = new Uint8Array(n);
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new Blob([u8arr], { type: mime });
    }
}

function cleanSelect(selectId, message) {
    let select = document.getElementById(selectId);
    select.innerHTML = `<option value="" selected hidden>Sélectionner ${message}</option>`;
}