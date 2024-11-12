@extends('superadminlayout.main')

@section('title', 'Profile')

<head>
    <style>
        .picture {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .picture-box img {
            border-radius: 10px
        }

        .picture-box:hover {
            box-shadow: 1px 1px 2px;
        }

        .picture-box img:hover {
            border-radius: 2px;
        }

        .img-thumbnail {
            cursor: pointer;
        }

        /* Adjusted styles for the modal image */
        #modalImage {
            max-width: 90%;
            /* Adjust max-width as needed */
            max-height: 90%;
            /* Adjust max-height as needed */
            object-fit: contain;
            /* Maintain aspect ratio */
        }
    </style>
</head>

@section('content')
    <div class="container-fluid p-0">
        <div class="mb-3 row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Images</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ route('superadmin.gallery') }}" style="float: right" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @include('partials.alert')
    @if (count($images) > 0)
        <div class="picture">
            @foreach ($images as $pic)
                <div class="picture-box mx-auto">
                    <img src="{{ asset('template/images/' . $pic->image) }}" alt="{{ $pic->image }}" width="280"
                        height="340" alt="{{ $pic->image }}"
                        onclick="openModal('{{ asset('template/images/' . $pic->image) }}')" />
                    <form action="{{ route('superadmin.gallery.image.destroy', $pic) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="form-control btn btn-danger" style="float: ledft;" value="Delete">
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No Image Found!</div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center">
                    <img id="modalImage" src="" class="img-fluid" alt="Large Image">
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        function openModal(imageSrc) {
            $('#modalImage').attr('src', imageSrc);
            $('#imageModal').modal('show');
        }
    </script>

@endsection
