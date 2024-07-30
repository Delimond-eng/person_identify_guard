document.addEventListener("DOMContentLoaded", function() {
    cameraManager();

    fetchProvinces();

    handleMaritalStatusChange();

    addEnfantField();

    addFamilleMembreField();

    addEtudeTitreField();

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

    function addEnfantField() {
        let enfantsSection = document.getElementById("enfants-section");
        let addEnfantBtn = enfantsSection.querySelector(".btn-primary.btn-sm");
        let enfantsList = document.getElementById("enfants-list");
        let enfantIndex = 1;

        addEnfantBtn.addEventListener("click", function() {
            // Create the new child name input field
            let newNomDiv = document.createElement("div");
            newNomDiv.className = "col-xl-6 enfant-group section-group";
            newNomDiv.id = `enfant-${enfantIndex}`;

            let nomInputDiv = document.createElement("div");
            nomInputDiv.className = "form-floating mb-3";

            let nomInput = document.createElement("input");
            nomInput.type = "text";
            nomInput.className = "form-control";
            nomInput.id = `enfant_nom-${enfantIndex}`;
            nomInput.placeholder = "entrez le nom complet de l'enfant...";
            nomInput.name = `enfants[${enfantIndex}][eft_nom]`;
            let nomLabel = document.createElement("label");
            nomLabel.htmlFor = `enfant_nom-${enfantIndex}`;
            nomLabel.textContent = "Nom de l'Enfant";

            nomInputDiv.appendChild(nomInput);
            nomInputDiv.appendChild(nomLabel);
            newNomDiv.appendChild(nomInputDiv);

            // Create the new child date of birth input field
            let newDateDiv = document.createElement("div");
            newDateDiv.className = "col-xl-6 enfant-group section-group";
            newDateDiv.id = `enfant-${enfantIndex}`;

            let dateInputDiv = document.createElement("div");
            dateInputDiv.className = "form-floating";

            let dateInput = document.createElement("input");
            dateInput.type = "date";
            dateInput.className = "form-control";
            dateInput.id = `enfant_date_naissance-${enfantIndex}`;
            dateInput.placeholder = "Date de Naissance";
            dateInput.name = `enfants[${enfantIndex}][eft_date_naissance]`;

            let dateLabel = document.createElement("label");
            dateLabel.htmlFor = `enfant_date_naissance-${enfantIndex}`;
            dateLabel.textContent = "Date de Naissance de l'Enfant";

            dateInputDiv.appendChild(dateInput);
            dateInputDiv.appendChild(dateLabel);
            newDateDiv.appendChild(dateInputDiv);

            // Append the new input fields to the enfants list
            enfantsList.appendChild(newNomDiv);
            enfantsList.appendChild(newDateDiv);

            // Increment the index for the next pair of input fields
            enfantIndex++;
        });
    }

    function addFamilleMembreField() {
        let familleSection = document.getElementById("membres-section");
        let addMembreBtn = familleSection.querySelector(".btn-primary.btn-sm");
        let enfantsList = document.getElementById("membres-list");
        let membreIndex = 1;

        addMembreBtn.addEventListener("click", function() {
            // Create the new family member name input field
            let newNomDiv = document.createElement("div");
            newNomDiv.className = "col-xl-6 enfant-group section-group";
            newNomDiv.id = `enfant-${membreIndex}`;

            let nomInputDiv = document.createElement("div");
            nomInputDiv.className = "form-floating mb-3";

            let nomInput = document.createElement("input");
            nomInput.type = "text";
            nomInput.className = "form-control";
            nomInput.placeholder = "entrez le nom du membre de la famille...";
            nomInput.name = `famille_charges[${membreIndex}][nom_membre_famille]`;

            let nomLabel = document.createElement("label");
            nomLabel.textContent = "Nom du Membre";

            nomInputDiv.appendChild(nomInput);
            nomInputDiv.appendChild(nomLabel);
            newNomDiv.appendChild(nomInputDiv);

            // Create the new family member relationship select field
            let newLienDiv = document.createElement("div");
            newLienDiv.className = "col-xl-6 enfant-group section-group";
            newLienDiv.id = `enfant-${membreIndex}`;

            let lienInputDiv = document.createElement("div");
            lienInputDiv.className = "form-floating";

            let lienSelect = document.createElement("select");
            lienSelect.className = "form-select";
            lienSelect.name = `famille_charges[${membreIndex}][lien_parent]`;
            let hiddenOption = document.createElement("option");
            hiddenOption.selected = true;
            hiddenOption.hidden = true;
            hiddenOption.textContent = "Sélectionner un lien de parenté";
            lienSelect.appendChild(hiddenOption);
            let lienOptions = [
                "Parent",
                "Frère",
                "Soeur",
                "Cousin(e)",
                "Ami(e)",
                "Autre",
            ];
            lienOptions.forEach(function(optionText) {
                let option = document.createElement("option");
                option.value = optionText;
                option.textContent = optionText;
                lienSelect.appendChild(option);
            });

            let lienLabel = document.createElement("label");
            lienLabel.textContent = "Lien de Parenté";

            lienInputDiv.appendChild(lienSelect);
            lienInputDiv.appendChild(lienLabel);
            newLienDiv.appendChild(lienInputDiv);

            // Append the new input fields to the enfants list
            enfantsList.appendChild(newNomDiv);
            enfantsList.appendChild(newLienDiv);

            // Increment the index for the next pair of input fields
            membreIndex++;
        });
    }

    function addEtudeTitreField() {
        let etudesSection = document.getElementById("etudes-section");
        let addEtudeTitreBtn = document.getElementById("add-etude-titre");
        let etudeIndex = 1;

        addEtudeTitreBtn.addEventListener("click", function() {
            // Create the new title input field
            let newTitleDiv = document.createElement("div");
            newTitleDiv.className = "col-xl-6 enfant-group section-group";
            newTitleDiv.id = `enfant-${etudeIndex}`;

            let titleInputDiv = document.createElement("div");
            titleInputDiv.className = "form-floating mb-3";

            let titleInput = document.createElement("input");
            titleInput.type = "text";
            titleInput.placeholder = "entrez le libellé du titre...";
            titleInput.className = "form-control";
            titleInput.name = `etude_titres[${etudeIndex}][titre_libelle]`;

            let titleLabel = document.createElement("label");
            titleLabel.htmlFor = `titre_libelle`;
            titleLabel.textContent = "Libellé du Titre";

            titleInputDiv.appendChild(titleInput);
            titleInputDiv.appendChild(titleLabel);
            newTitleDiv.appendChild(titleInputDiv);

            // Create the new date input field
            let newDateDiv = document.createElement("div");
            newDateDiv.className = "col-xl-6 enfant-group section-group";
            newDateDiv.id = `enfant-${etudeIndex}`;

            let dateInputDiv = document.createElement("div");
            dateInputDiv.className = "form-floating";

            let dateInput = document.createElement("input");
            dateInput.type = "date";
            dateInput.className = "form-control";
            dateInput.name = `etude_titres[${etudeIndex}][titre_date_obtention]`;

            let dateLabel = document.createElement("label");
            dateLabel.htmlFor = `titre_date_obtention`;
            dateLabel.textContent = "Date d'Obtention";

            dateInputDiv.appendChild(dateInput);
            dateInputDiv.appendChild(dateLabel);
            newDateDiv.appendChild(dateInputDiv);

            // Append the new input fields to the etudes section
            etudesSection
                .querySelector(".card-body .row")
                .appendChild(newTitleDiv);
            etudesSection
                .querySelector(".card-body .row")
                .appendChild(newDateDiv);

            // Increment the index for the next pair of input fields
            etudeIndex++;
        });
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