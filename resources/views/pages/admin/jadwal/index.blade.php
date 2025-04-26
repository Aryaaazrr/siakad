@extends('layouts.main')

@section('title', 'Jadwal')

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
                                <h3 class="card-title">Data Jadwal</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default">
                                        Tambah
                                    </button>
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data Jadwal</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('jadwal.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Hari</label>
                                                                <select name="hari" class="form-control select2" style="width: 100%;">
                                                                    <option selected="selected" value="Senin">Senin</option>
                                                                    <option value="Selasa">Selasa</option>
                                                                    <option value="Rabu">Rabu</option>
                                                                    <option value="Kamis">Kamis</option>
                                                                    <option value="Jumat">Jumat</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Mata Kuliah</label>
                                                                <select name="matkul" class="form-control select2"
                                                                    style="width: 100%;">
                                                                    <option selected="selected">Pilih Mata Kuliah</option>
                                                                    @foreach ($matakuliah as $item)
                                                                        <option value="{{ $item->kode_mk }}">
                                                                            {{ $item->kode_mk }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Ruangan</label>
                                                                <select name="ruang" class="form-control select2"
                                                                    style="width: 100%;">
                                                                    <option selected="selected">Pilih Ruangan</option>
                                                                    @foreach ($ruangan as $item)
                                                                        <option value="{{ $item->id_ruang }}">
                                                                            {{ $item->nama_ruang }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Golongan</label>
                                                                <select name="gol" class="form-control select2"
                                                                    style="width: 100%;">
                                                                    <option selected="selected">Pilih Golongan</option>
                                                                    @foreach ($golongan as $item)
                                                                        <option value="{{ $item->id_gol }}">
                                                                            {{ $item->nama_gol }}</option>
                                                                    @endforeach
                                                                </select>
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
                                            <th class="w-25">Hari</th>
                                            <th class="w-25">Mata Kuliah</th>
                                            <th class="w-25">Ruangan</th>
                                            <th class="w-20">Golongan</th>
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
                        <form action="{{ route('dosen.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip"
                                        placeholder="nip" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        placeholder="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Handphone</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp"
                                        placeholder="no_hp" required>
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
                ajax: "{{ route('jadwal') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'hari',
                        name: 'hari'
                    },
                    {
                        data: 'kode_mk',
                        name: 'kode_mk'
                    },
                    {
                        data: 'id_ruang',
                        name: 'id_ruang'
                    },
                    {
                        data: 'id_gol',
                        name: 'id_gol'
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
                                ' data-target="#modal-edit" data-id="' + data.nip +
                                '" data-nama="' + data.nama +
                                '" data-alamat="' + data.alamat + '" data-no_hp="' + data.no_hp +
                                '">' +
                                'Edit' +
                                '</button>' +
                                '<button type="button" class="btn btn-danger m-1" onclick="confirmDelete(\'' +
                                data.nip + '\')"' +
                                ' data-id="' + data.nip + '">Hapus</button>' +
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
                var nip = button.data('id');
                var nama = button.data('nama');
                var alamat = button.data('alamat');
                var no_hp = button.data('no_hp');
                var modal = $(this);

                modal.find('.modal-body #nip').val(nip);
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #alamat').val(alamat);
                modal.find('.modal-body #no_hp').val(no_hp);
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
                        url: "{{ url('admin/dosen') }}/" + id,
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
