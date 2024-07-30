document.addEventListener("DOMContentLoaded", function() {
    cameraManager();

    fetchProvinces();

    handleMaritalStatusChange();

    handleAddEnfant();

    handleAddFamilleCharge();

    handleAddEtudeTitre();

    loadDynamicOptions();

    function fetchProvinces() {
        fetch("/provinces")
            .then((response) => response.json())
            .then((data) => {
                let provinceSelect = document.getElementById("province_id");
                if (provinceSelect) {
                    provinceSelect.innerHTML =
                        '<option value="" selected hidden>Sélectionner une province</option>';
                    data.forEach((province) => {
                        let option = document.createElement("option");
                        option.value = province.id;
                        option.textContent = province.province_libelle;
                        provinceSelect.appendChild(option);
                    });
                }
            });
    }

    function handleMaritalStatusChange() {
        document
            .querySelectorAll('input[name="etat_civil"]')
            .forEach((input) => {
                input.addEventListener("change", function() {
                    let conjointsSection =
                        document.getElementById("conjoints-section");
                    let familleChargesSection = document.getElementById(
                        "famille-charges-section"
                    );
                    let enfantsSection =
                        document.getElementById("enfants-section");

                    if (this.value === "marié") {
                        toggleVisibility(
                            [
                                conjointsSection,
                                familleChargesSection,
                                enfantsSection,
                            ],
                            true
                        );
                    } else if (
                        this.value === "divorcé" ||
                        this.value === "veuf"
                    ) {
                        toggleVisibility([conjointsSection], false);
                        toggleVisibility(
                            [familleChargesSection, enfantsSection],
                            true
                        );
                    } else {
                        toggleVisibility(
                            [
                                conjointsSection,
                                familleChargesSection,
                                enfantsSection,
                            ],
                            false
                        );
                    }
                });
            });
    }

    function handleAddEnfant() {
        let enfantIndex = 1;
        let btnAddEft = document.getElementById("add-enfant");
        if (btnAddEft) {
            btnAddEft.addEventListener("click", function() {
                addEnfantField(enfantIndex);
                enfantIndex++;
            });
        }
    }

    function addEnfantField(index) {
        const enfantGroup = `
            <div class="enfant-group border p-3 mb-3 section-group">
                <button class="clean-btn" type="button">
                    <i class="icon-trash-2"></i>
                </button>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="enfant_nom">Nom de l'Enfant</label>
                        <input type="text" placeholder="entrez le nom complet de l'enfant..." class="form-control" name="enfants[${index}][eft_nom]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="enfant_date_naissance">Date de Naissance de l'Enfant</label>
                        <input type="date" class="form-control" name="enfants[${index}][eft_date_naissance]" required>
                    </div>
                </div>
            </div>`;
        document
            .getElementById("enfants-section")
            .insertAdjacentHTML("beforeend", enfantGroup);
    }

    function handleAddFamilleCharge() {
        let familleChargeIndex = 1;
        let btnAddCharge = document.getElementById("add-famille-charge");
        if (btnAddCharge) {
            btnAddCharge.addEventListener("click", function() {
                addFamilleChargeField(familleChargeIndex);
                familleChargeIndex++;
            });
        }
    }

    function addFamilleChargeField(index) {
        const familleChargeGroup = `
            <div class="famille-charge-group border p-3 mb-3 section-group">
                <button class="clean-btn" type="button">
                    <i class="icon-trash-2"></i>
                </button>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="famille_nom">Nom du Membre</label>
                        <input type="text" placeholder="entrez le nom du membre de la famille..." class="form-control" name="famille_charges[${index}][nom_membre_famille]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="famille_lien">Lien de Parenté</label>
                        <input type="text" placeholder="entrez lien parental..." class="form-control" name="famille_charges[${index}][lien_parent]" required>
                    </div>
                </div>
            </div>`;
        document
            .getElementById("famille-charges-section")
            .insertAdjacentHTML("beforeend", familleChargeGroup);
    }

    function handleAddEtudeTitre() {
        let etudeTitreIndex = 1;
        let btnAddEtude = document.getElementById("add-etude-titre");
        if (btnAddEtude) {
            btnAddEtude.addEventListener("click", function() {
                addEtudeTitreField(etudeTitreIndex);
                etudeTitreIndex++;
            });
        }
    }

    function addEtudeTitreField(index) {
        const etudeTitreGroup = `
            <div class="etude-titre-group border p-3 mb-3 section-group">
                <button class="clean-btn" type="button">
                    <i class="icon-trash-2"></i>
                </button>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titre_libelle">Libellé du Titre</label>
                        <input type="text" placeholder="entrez le libellé du titre..." class="form-control" name="etude_titres[${index}][titre_libelle]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titre_date_obtention">Date d'Obtention</label>
                        <input type="date" class="form-control" name="etude_titres[${index}][titre_date_obtention]" required>
                    </div>
                </div>
            </div>`;
        document
            .getElementById("etudes-section")
            .insertAdjacentHTML("beforeend", etudeTitreGroup);
    }

    function loadDynamicOptions() {
        let provinceSelect = document.getElementById("province_id");
        let territoireSelect = document.getElementById("territoire_id");
        let secteurSelect = document.getElementById("secteur_id");
        let chefferieSelect = document.getElementById("chefferie_id");

        if (provinceSelect) {
            provinceSelect.addEventListener("change", function() {
                const provinceId = this.value;
                cleanSelect("territoire_id", "une territoire");
                cleanSelect("secteur_id", "un secteur");
                cleanSelect("chefferie_id", "une chefferie");
                fetchOptions(
                    "/territoires?province_id=" + provinceId,
                    "territoire_id",
                    "territoire_libelle",
                    "un territoire"
                );
            });
        }

        if (territoireSelect) {
            territoireSelect.addEventListener("change", function() {
                cleanSelect("secteur_id", "un secteur");
                cleanSelect("chefferie_id", "une chefferie");
                const territoireId = this.value;
                fetchOptions(
                    "/secteurs?territoire_id=" + territoireId,
                    "secteur_id",
                    "secteur_libelle",
                    "un secteur"
                );
            });
        }

        if (secteurSelect) {
            secteurSelect.addEventListener("change", function() {
                cleanSelect("chefferie_id", "une chefferie");
                const secteurId = this.value;
                fetchOptions(
                    "/chefferies?secteur_id=" + secteurId,
                    "chefferie_id",
                    "chefferie_libelle",
                    "une chefferie"
                );
            });
        }
    }

    function fetchOptions(url, selectId, libelle, placeholder) {
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                let select = document.getElementById(selectId);
                if (select) {
                    cleanSelect(selectId, placeholder);
                    data.forEach((item) => {
                        let option = document.createElement("option");
                        option.value = item.id;
                        option.textContent = item[libelle];
                        select.appendChild(option);
                    });
                }
            });
    }

    function cleanSelect(selectId, placeholder) {
        let select = document.getElementById(selectId);
        if (select) {
            select.innerHTML = `<option value="" selected hidden>Sélectionner ${placeholder}</option>`;
        }
    }

    function toggleVisibility(elements, show) {
        elements.forEach((element) => {
            if (element) {
                element.classList.toggle("d-none", !show);
            }
        });
    }
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
                '<i class="ri-camera-2-fill me-1"></i>Faire capture';
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
                '<i class="ri-camera-2-line me-1"></i>Lancer caméra';
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