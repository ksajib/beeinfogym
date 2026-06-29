<div>
    {{-- <style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    </style> --}}
    <div class="avatar-wrapper" id="open-modal-trigger">
        <img class="avatar-img" id="main-profile-avatar"
            src="{{ $profile->profile_photo ? asset('storage/avatars/' . $profile->profile_photo) : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=400' }}"
            alt="Avatar">
        <div class="edit-icon-btn">
            <svg viewBox="0 0 24 24">
                <path
                    d="M4 4h3l2-3h6l2 3h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2zm8 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6z" />
            </svg>
        </div>
    </div>

    <div class="modal-backdrop" id="upload-modal">
        <div class="upload-card">
            <button class="close-modal-btn" id="close-modal-trigger">&times;</button>

            <h3>Crop & Upload</h3>
            <p id="modal-desc">Drop your image here to start cropping</p>

            <div class="drop-zone" id="drop-zone">
                <span class="upload-icon">📁</span>
                <div class="drop-zone-text">Drop your image here, or <span>browse</span></div>
                <input type="file" id="file-input" accept="image/*">
            </div>

            <div class="crop-container" id="crop-container">
                <div class="img-box" id="img-box">
                    <img src="" id="crop-target-img" alt="Source Image">
                </div>
                <div class="action-row">
                    <button class="btn btn-secondary" id="change-btn">Cancel</button>
                    <button class="btn btn-primary" id="save-btn">Crop & Save</button>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <script>
        const modal = document.getElementById('upload-modal');
        const openTrigger = document.getElementById('open-modal-trigger');
        const closeTrigger = document.getElementById('close-modal-trigger');

        const dropZone = document.getElementById('drop-zone');
        const imgBox = document.getElementById('img-box');
        const fileInput = document.getElementById('file-input');
        const cropContainer = document.getElementById('crop-container');
        const cropTargetImg = document.getElementById('crop-target-img');
        const mainProfileAvatar = document.getElementById('main-profile-avatar');
        const modalDesc = document.getElementById('modal-desc');

        const changeBtn = document.getElementById('change-btn');
        const saveBtn = document.getElementById('save-btn');

        let cropperInstance = null;

        /* Modal Framework Triggers */
        openTrigger.addEventListener('click', () => modal.classList.add('is-open'));
        closeTrigger.addEventListener('click', closeModalAndReset);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModalAndReset();
        });

        function closeModalAndReset() {
            modal.classList.remove('is-open');
            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }
            fileInput.value = '';
            cropTargetImg.src = '';
            cropContainer.style.display = 'none';
            dropZone.style.display = 'block';
            modalDesc.innerText = "Drop your image here to start cropping";
        }

        /* Drag & Drop Overrides */
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            modal.addEventListener(eventName, (e) => e.preventDefault(), false);
        });

        dropZone.addEventListener('click', () => fileInput.click());
        dropZone.addEventListener('dragover', () => dropZone.classList.add('drag-over'));
        ['dragleave', 'dragend'].forEach(ev => dropZone.addEventListener(ev, () => dropZone.classList.remove('drag-over')));
        dropZone.addEventListener('drop', (e) => {
            dropZone.classList.remove('drag-over');
            if (e.dataTransfer.files.length) initCropperState(e.dataTransfer.files[0]);
        });

        imgBox.addEventListener('dragover', () => imgBox.classList.add('drag-over'));
        ['dragleave', 'dragend'].forEach(ev => imgBox.addEventListener(ev, () => imgBox.classList.remove('drag-over')));
        imgBox.addEventListener('drop', (e) => {
            imgBox.classList.remove('drag-over');
            if (e.dataTransfer.files.length) initCropperState(e.dataTransfer.files[0]);
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) initCropperState(fileInput.files[0]);
        });

        /* The Core Cropping Engine */
        function initCropperState(file) {
            if (!file.type.startsWith('image/')) return;

            // Destroy previous cropper
            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }

            const reader = new FileReader();

            reader.onload = (e) => {
                cropTargetImg.src = e.target.result;

                // Show crop UI
                dropZone.style.display = 'none';
                cropContainer.style.display = 'flex';
                modalDesc.innerText = "Drag, resize, or zoom the image to crop it.";

                cropTargetImg.onload = () => {

                    cropperInstance = new Cropper(cropTargetImg, {
                        aspectRatio: NaN, // Square crop for avatar
                        viewMode: 1,
                        // User Controls
                        movable: true,
                        zoomable: true,
                        scalable: true,
                        rotatable: false,

                        cropBoxMovable: true,
                        cropBoxResizable: true,

                        dragMode: 'move',

                        // Initial crop area size
                        autoCropArea: 0.8,

                        responsive: true,
                        restore: false,
                        guides: true,
                        center: true,
                        highlight: true,
                        background: false,

                        minCropBoxWidth: 100,
                        minCropBoxHeight: 100,

                        wheelZoomRatio: 0.1,
                    });
                };
            };

            reader.readAsDataURL(file);
        }

        changeBtn.addEventListener('click', closeModalAndReset);

        saveBtn.addEventListener('click', () => {
            if (cropperInstance) {
                const canvas = cropperInstance.getCroppedCanvas({
                    width: 300,
                    height: 300,
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high',
                });

                // 1. Convert the canvas to a Blob (file format)
                canvas.toBlob((blob) => {
                    if (!blob) return;

                    // 2. Prepare the payload using FormData
                    const formData = new FormData();
                    formData.append('profile_image', blob, 'avatar.jpg');

                    // 3. Include the Laravel CSRF Token
                    // Ensure you have <meta name="csrf-token" content="{{ csrf_token() }}"> in your layout head
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');

                    // 4. Send the AJAX request to Laravel
                    fetch('/user/profile/upload-avatar', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json' // Instructs Laravel to return JSON responses instead of redirects
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update the image on the UI upon success
                                mainProfileAvatar.src = data.image_url;
                                closeModalAndReset();
                                showToast('success', 'Success', 'Avatar updated successfully!');
                            } else {
                                showToast('error', 'Error', "Upload failed");
                            }
                        })
                        .catch(error => {
                            showToast('error', 'Error', "An error occurred during upload.");
                        });

                }, 'image/jpeg', 0.9); // Type and quality (0.9 = 90%)
            }
        });
    </script>
</div>
