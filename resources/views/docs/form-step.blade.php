@extends('layout.main')
@section('content')

<style>
    .step {
      display: none;
      opacity: 0;
      transform: translateX(20px);
      transition: opacity 0.4s ease, transform 0.4s ease;
    }
    .step.active {
      display: block;
      opacity: 1;
      transform: translateX(0);
    }
</style>

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <!-- start Advanced Form Example -->
                <div class="card">
                    <div class="card-body">
                        <!-- Progress -->
                        <div class="mb-4 text-center">
                            <span id="progress-text" class="fw-bold">Pertanyaan 1 dari 5</span>
                        </div>

                        <form id="multiStepForm" action="" method="POST">
                            <!-- STEP -->
                            <div
                                id="global-error" 
                                class="alert customize-alert alert-dismissible rounded-pill alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon"
                                role="alert"
                                style="display:none;"
                            >
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close"
                                ></button>
                                <div class="d-flex align-items-center me-3 me-md-0">
                                    <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                                    Silakan pilih salah satu opsi.
                                </div>
                            </div>

                            <!-- STEP -->
                            <div class="step active">
                                <h5 class="mb-3 fw-semibold">
                                    Apakah sudah memiliki aplikasi Sales Tools ?
                                </h5>
                                <div class="form-check">
                                    <input
                                        class="form-check-input danger"
                                        type="radio"
                                        name="step1"
                                        value="Paham"
                                    />
                                    <label class="form-check-label">Paham</label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input danger"
                                        type="radio"
                                        name="step1"
                                        value="Tidak Paham"
                                    />
                                    <label class="form-check-label">Tidak Paham</label>
                                </div>

                                <div class="form-check mb-3">
                                    <input
                                        class="form-check-input danger"
                                        type="radio"
                                        name="step1"
                                        value="Tidak Dipakai"
                                    />
                                    <label class="form-check-label">Tidak Dipakai</label>
                                </div>
                                
                                <label class="fw-semibold mb-2">Keterangan</label>
                                <input type="text" class="form-control" name="ket1" style="border: 1px solid #e0e0e0" />

                                <div class="d-flex justify-content-end mt-4">
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger"
                                        onclick="nextStep()"
                                    >
                                        <i class="ti ti-arrow-right"></i>
                                        Lanjut
                                    </button>
                                </div>
                            </div>

                            <!-- STEP -->
                            <div class="step">
                                <h5 class="mb-3 fw-semibold">
                                    Apakah tahu cara registrasi Sales tools ?
                                </h5>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="step4"
                                        value="Sudah"
                                    />
                                    <label class="form-check-label">Sudah</label>
                                </div>

                                <div class="form-check mb-3">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="step4"
                                        value="Belum"
                                    />
                                    <label class="form-check-label">Belum</label>
                                </div>

                                <label class="fw-semibold">Keterangan</label>
                                <input type="text" class="form-control" name="ket4" />

                                <div class="d-flex justify-content-between mt-4">
                                    <button
                                        type="button"
                                        class="btn btn-outline-dark btn-custom-outline"
                                        onclick="prevStep()"
                                    >
                                        <i class="ti ti-arrow-left"></i>
                                        Kembali
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger"
                                        onclick="nextStep()"
                                    >
                                        <i class="ti ti-arrow-right"></i>
                                        Lanjut
                                    </button>
                                </div>
                            </div>

                            <!-- STEP -->
                            <div class="step">
                                <h5 class="mb-3 fw-semibold">
                                    Apakah sudah memiliki Honda ID ?
                                </h5>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="step5"
                                        value="Puas"
                                    />
                                    <label class="form-check-label">Puas</label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="step5"
                                        value="Cukup Puas"
                                    />
                                    <label class="form-check-label">Cukup Puas</label>
                                </div>

                                <div class="form-check mb-3">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="step5"
                                        value="Tidak Puas"
                                    />
                                    <label class="form-check-label">Tidak Puas</label>
                                </div>

                                <label class="fw-semibold">Keterangan</label>
                                <input type="text" class="form-control" name="ket5" />

                                <div class="d-flex justify-content-between mt-4">
                                    <button
                                        type="button"
                                        class="btn btn-outline-dark btn-custom-outline"
                                        onclick="prevStep()"
                                    >
                                        <i class="ti ti-arrow-left"></i>
                                        Kembali
                                    </button>
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="ti ti-check"></i>
                                        Selesai
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- end Advanced Form Example -->

            </div>
        </div>
    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const progressText = document.getElementById("progress-text");

    function validateStep(stepIndex) {
        let radios = steps[stepIndex].querySelectorAll("input[type='radio']");
        let errorBox = document.getElementById("global-error");
        let checked = [...radios].some((r) => r.checked);

        if (!checked) {
            errorBox.style.display = "block";
            return false;
        } else {
            errorBox.style.display = "none";
            return true;
        }
    }

    function showStep(n) {
        steps.forEach((step, i) => {
            step.classList.remove("active");
            if (i === n) {
                setTimeout(() => step.classList.add("active"), 20);
            }
        });

        progressText.innerText = `Step ${n + 1} dari ${steps.length}`;
    }

    function nextStep() {
        if (!validateStep(currentStep)) return;

        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    const form = document.getElementById("multiStepForm");

    form.addEventListener("submit", function(e) {
        if (!validateStep(currentStep)) {
            e.preventDefault();
            return;
        }
    });


    document.querySelectorAll("input[type='radio']").forEach(radio => {
        radio.addEventListener("change", function() {
            document.getElementById("global-error").style.display = "none";
        });
    });

</script>


@endsection