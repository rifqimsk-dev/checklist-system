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

        <div class="card">
            <div class="card-body">

                <!-- Progress -->
                <div class="mb-4 text-center">
                    <span id="progress-text" class="fw-bold"></span>
                </div>

                <form id="multiStepForm" action="{{ route('isichecklist.store') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama"  class="form-control" style="border:1px solid #e0e0e0">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hondaID">Honda ID</label>
                            <input type="text" name="hondaID" id="hondaID"  class="form-control" style="border:1px solid #e0e0e0">
                        </div>
                    </div>

                    {{-- STEP LOOP --}}
                    @foreach ($form_checklist as $row)
                    <div class="step @if($loop->first) active @endif">
                        
                        <h5 class="mb-3 fw-semibold">{{ $row->pertanyaan }}</h5>
                        {{-- ALERT ERROR --}}
                        <div id="global-error" 
                            class="alert customize-alert alert-dismissible rounded-pill alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon"
                            role="alert"
                            style="display:none;"
                        >
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <div class="d-flex align-items-center me-3 me-md-0">
                                <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                                Silakan pilih salah satu opsi.
                            </div>
                        </div>

                        {{-- simpan id pertanyaan --}}
                        <input type="hidden" name="pertanyaan[]" value="{{ $row->pertanyaan }}">

                        {{-- RADIO --}}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                name="indikator[{{ $loop->index }}]" value="1">
                            <label class="form-check-label">Paham</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                name="indikator[{{ $loop->index }}]" value="2">
                            <label class="form-check-label">Tidak Paham</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" 
                                name="indikator[{{ $loop->index }}]" value="3">
                            <label class="form-check-label">Tidak Dipakai</label>
                        </div>

                        {{-- KETERANGAN --}}
                        <label class="fw-semibold mb-2">Keterangan</label>
                        <input type="text" class="form-control" 
                            name="keterangan[{{ $loop->index }}]" style="border:1px solid #e0e0e0" />

                        {{-- BUTTON NAVIGATION --}}
                        <div class="d-flex justify-content-between mt-4">

                            @if (!$loop->first)
                                <button type="button" class="btn btn-outline-dark" onclick="prevStep()">
                                    <i class="ti ti-arrow-left"></i> Kembali
                                </button>
                            @endif

                            @if (!$loop->last)
                                <button type="button" class="btn btn-outline-danger" onclick="nextStep()">
                                    <i class="ti ti-arrow-right"></i> Lanjut
                                </button>
                            @endif

                            @if ($loop->last)
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="ti ti-check"></i> Selesai
                                </button>
                            @endif

                        </div>

                    </div>
                    @endforeach


                </form>


            </div>
        </div>

    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const progressText = document.getElementById("progress-text");

    // Tampilkan step pertama
    updateProgress();

    function updateProgress() {
        progressText.innerText = `Pertanyaan ${currentStep + 1} dari ${steps.length}`;
    }

    function validateStep(stepIndex) {
        let radios = steps[stepIndex].querySelectorAll("input[type='radio']");
        let checked = [...radios].some(r => r.checked);

        if (!checked) {
            document.getElementById("global-error").style.display = "block";
            return false;
        }

        document.getElementById("global-error").style.display = "none";
        return true;
    }

    function showStep(n) {
        steps.forEach((step, i) => step.classList.remove("active"));
        steps[n].classList.add("active");
        updateProgress();
    }

    function nextStep() {
        if (!validateStep(currentStep)) return;   // Cek dulu
        currentStep++;
        showStep(currentStep);
    }

    function prevStep() {
        currentStep--;
        showStep(currentStep);
    }

    // ===================================================
    //  VALIDASI SUBMIT (TOMBOL SELESAI)
    // ===================================================
    document.getElementById("multiStepForm").addEventListener("submit", function(e) {
        if (!validateStep(currentStep)) {
            e.preventDefault();              // stop submit
            return;
        }
    });

    // Hide error on radio change
    document.querySelectorAll("input[type='radio']").forEach(r => {
        r.addEventListener("change", function() {
            document.getElementById("global-error").style.display = "none";
        });
    });
</script>


@endsection
