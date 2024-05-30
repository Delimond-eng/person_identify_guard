document.addEventListener("DOMContentLoaded", function() {
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
            <div class="enfant-group border p-3 mb-3">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="enfant_nom">Nom de l'Enfant</label>
                        <input type="text" class="form-control" name="enfants[${enfantIndex}][eft_nom]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="enfant_date_naissance">Date de Naissance de l'Enfant</label>
                        <input type="date" class="form-control" name="enfants[${enfantIndex}][eft_date_naissance]" required>
                    </div>
                </div>
            </div>`;
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
            <div class="famille-charge-group border p-3 mb-3">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="famille_nom">Nom du Membre</label>
                        <input type="text" class="form-control" name="famille_charges[${familleChargeIndex}][nom_membre_famille]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="famille_lien">Lien de Parenté</label>
                        <input type="text" class="form-control" name="famille_charges[${familleChargeIndex}][lien_parent]" required>
                    </div>
                </div>
            </div>`;
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
            <div class="etude-titre-group border p-3 mb-3">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="titre_libelle">Libellé du Titre</label>
                        <input type="text" class="form-control" name="etude_titres[${etudeTitreIndex}][titre_libelle]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="titre_date_obtention">Date d'Obtention</label>
                        <input type="date" class="form-control" name="etude_titres[${etudeTitreIndex}][titre_date_obtention]" required>
                    </div>
                </div>
            </div>`;
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
                    territoireSelect.innerHTML =
                        '<option value="" selected hidden>Sélectionner un territoire</option>';
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
                    secteurSelect.innerHTML =
                        '<option value="" selected hidden>Sélectionner un secteur</option>';
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
                    chefferieSelect.innerHTML =
                        '<option value="" selected hidden>Sélectionner une chefferie</option>';
                    data.forEach((chefferie) => {
                        let option = document.createElement("option");
                        option.value = chefferie.id;
                        option.textContent = chefferie.chefferie_libelle;
                        chefferieSelect.appendChild(option);
                    });
                });
        });
});