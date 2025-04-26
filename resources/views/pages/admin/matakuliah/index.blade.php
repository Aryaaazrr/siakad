@extends('layouts.main')

@section('title', 'Mata Kuliah')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Mata Kuliah</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default">
                                        Tambah
                                    </button>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data Mata Kuliah</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('mata-kuliah.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="card-body">
                                                            {{-- <div class="form-group">
                                                                <label for="kode_mk">Kode MK</label>
                                                                <input type="text" class="form-control" name="kode_mk"
                                                                    id="kode_mk" placeholder="kode_mk" required>
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="nama_mk">nama_mk</label>
                                                                <input type="text" class="form-control" name="nama_mk"
                                                                    id="nama_mk" placeholder="nama_mk" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sks">SKS</label>
                                                                <input type="text" class="form-control" name="sks"
                                                                    id="sks" placeholder="sks" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="semester">Semester</label>
                                                                <input type="text" class="form-control" name="semester"
                                                                    id="semester" placeholder="semester" required>
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <label for="exampleInputFile">Cover</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="exampleInputFile" name="cover"
                                                                            accept="image/*" required>
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Choose
                                                                            file</label>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">Upload</span>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="form-group">
                                                                <label for="link">Link</label> <span
                                                                    class="text-danger">* Opsional</span>
                                                                <input type="text" class="form-control" name="link"
                                                                    id="link" placeholder="Link">
                                                            </div> --}}
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="w-5">No</th>
                                            <th class="w-25">Kode MK</th>
                                            <th class="w-25">Nama MK</th>
                                            <th class="w-20">SKS</th>
                                            <th class="w-20">Semester</th>
                                            <th class="w-5">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Portofolio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('mata-kuliah.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="kode_mk">Kode MK</label>
                                    <input type="text" class="form-control" name="kode_mk" id="kode_mk"
                                        placeholder="kode_mk" required>
                                </div> --}}
                                <input type="hidden" name="kode_mk" id="kode_mk">
                                <div class="form-group">
                                    <label for="nama_mk">nama_mk_mk</label>
                                    <input type="text" class="form-control" name="nama_mk" id="nama_mk"
                                        placeholder="nama_mk" required>
                                </div>
                                <div class="form-group">
                                    <label for="sks">sks</label>
                                    <input type="text" class="form-control" name="sks" id="sks"
                                        placeholder="sks" required>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <input type="text" class="form-control" name="semester" id="semester"
                                        placeholder="semester" required>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputFile">Cover</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="cover" accept="image/*">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="link">Link</label> <span class="text-danger">* Opsional</span>
                                    <input type="text" class="form-control" name="link" id="link"
                                        placeholder="Link">
                                </div> --}}
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oopss...',
                text: '{{ $errors->first() }}'
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $("#myTable").DataTable({
                processing: true,
                ordering: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ route('mata-kuliah') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_mk',
                        name: 'kode_mk'
                    },
                    {
                        data: 'nama_mk',
                        name: 'nama_mk'
                    },
                    {
                        data: 'sks',
                        name: 'sks'
                    },
                    {
                        data: 'semester',
                        name: 'semester'
                    },
                    // {
                    //     data: 'cover',
                    //     name: 'cover',
                    //     render: function(data) {
                    //         if (data == '') {
                    //             return '<img src="{{ asset('dist/img/LOGO POLITEKNIK NEGERI  JEMBER.png') }}" alt="" style="width: 50px; height: 50px;">';
                    //         } else {
                    //             return '<img src="{{ asset('cover/') }}/' + data +
                    //                 '" alt="" style="width: 100px; height: 50px;">';
                    //         }
                    //     }
                    // },
                    // {
                    //     data: 'link',
                    //     name: 'link',
                    //     render: function(data) {
                    //         if (data === null || data === '') {
                    //             return '<a href="#">No link available</a>';
                    //         } else {
                    //             return '<a href="' + data + '" target="_blank">' + data + '</a>';
                    //         }
                    //     }
                    // },
                    {
                        data: null,
                        render: function(data) {
                            return '<div class="row justify-content-center">' +
                                '<div class="col-auto">' +
                                '<button type="button" class="btn btn-warning m-1" data-toggle="modal"' +
                                ' data-target="#modal-edit" data-id="' + data.kode_mk +
                                '" data-nama_mk="' + data.nama_mk +
                                '" data-sks="' + data.sks + '" data-semester="' + data.semester +
                                '">' +
                                'Edit' +
                                '</button>' +
                                '<button type="button" class="btn btn-danger m-1" onclick="confirmDelete(\'' +
                                data.kode_mk + '\')"' +
                                ' data-id="' + data.kode_mk + '">Hapus</button>' +
                                '</div>' +
                                '</div>';
                        }
                    }
                ],
                rowCallback: function(row, data, index) {
                    var dt = this.api();
                    $(row).attr('data-id', data.id);
                    $('td:eq(0)', row).html(dt.page.info().start + index + 1);
                }
            });
            $('#modal-edit').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var kode_mk = button.data('id');
                var nama_mk = button.data('nama_mk');
                var sks = button.data('sks');
                var semester = button.data('semester');
                var modal = $(this);

                modal.find('.modal-body #kode_mk').val(kode_mk);
                modal.find('.modal-body #nama_mk').val(nama_mk);
                modal.find('.modal-body #sks').val(sks);
                modal.find('.modal-body #semester').val(semester);
            });

            // $('.datatable-input').on('input', function() {
            //     var searchText = $(this).val().toLowerCase();

            //     $('.table tr').each(function() {
            //         var rowData = $(this).text().toLowerCase();
            //         if (rowData.indexOf(searchText) === -1) {
            //             $(this).hide();
            //         } else {
            //             $(this).show();
            //         }
            //     });
            // });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('admin/mata-kuliah') }}/" + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            );
                            $('#myTable').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(error);

                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data. Silahkan coba lagi' + id,
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
