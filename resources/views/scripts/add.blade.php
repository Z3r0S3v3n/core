@extends('layouts.app')

@section('content')
    <button class="btn btn-success" onclick="history.back();">Geri Don</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#settingsModal">
        Ayarlar
    </button><br><br>
    <div class="cards">
        <div class="card w-auto">
            <div class="card-body">
                <h4 class="card-title">Gerekli Parametreler</h4>
                <h6>Kullanıcıya input olarak gösterilecek parametreler, parametre adları <b>aynı yazıldığı gibi</b> arayüzde gösterilecektir.</h6>
                <div class="form-inline">
                    <table>
                        <tr>
                            <td style="margin:10px;">
                                <div class="form-group">
                                    <input id="inputName" type="text" class="form-control" placeholder="Parametre Adı" data-validation="length" data-validation-length="min0">
                                </div>
                            </td>
                            <td style="margin:10px;">
                                <select class="form-control" name="inputs" id="inputType">
                                    <option value="string">Metin</option>
                                    <option value="number">Sayı</option>
                                    <option value="ip">Ip Adresi</option>
                                </select>
                            </td>
                            <td style="margin:10px;">
                                <button class="btn btn-primary" onclick="addInput()">Ekle</button>
                            </td>
                        </tr>
                    </table>

                </div>
                <br>
                <div class="inputs">

                </div>
            </div>
        </div>
        <div class="card w-auto" style="width: 18rem;">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Kodu buraya yazınız</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="card w-auto">
            <div class="card-body">
                <h5 class="card-title">Sonuç Parametreleri</h5>
                <div class="form-inline">
                    <table>
                        <tr>
                            <td style="margin:10px;">
                                <div class="form-group">
                                    <input id="inputName" type="text" class="form-control" placeholder="Parametre Adı" data-validation="length" data-validation-length="min0">
                                </div>
                            </td>
                            <td style="margin:10px;">
                                <select class="form-control" name="inputs" id="inputType">
                                    <option value="string" style="background-color: blue">Metin</option>
                                    <option value="number" style="background-color: pink">Sayı</option>
                                    <option value="ip">Ip Adresi</option>
                                </select>
                            </td>
                            <td style="margin:10px;">
                                <button class="btn btn-primary" onclick="addInput()">Ekle</button>
                            </td>
                        </tr>
                    </table>

                </div>
                <br>
                <div class="inputs">

                </div>
            </div>
        </div>
        <button class="btn btn-primary w-auto">
            Ekle
        </button>
    </div>

    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Betik Ayarları</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <h3>Adı</h3>
                            <input id="name" type="text" class="form-control" placeholder="Betik kısa adı" data-validation="length" data-validation-length="min0">
                        </div>
                        <div class="form-group">
                            <h3>Özellik</h3>
                            <select class="form-control" id="feature">
                                @foreach ($features as $feature)
                                    <option value="{{$feature->_id}}">{{$feature->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h3>Versiyon</h3>
                            <input id="username" type="text" class="form-control" placeholder="Betik Versiyonu" value="1">
                        </div>
                        <div class="form-group">
                            <h3>Açıklama</h3>
                            <input id="description" type="text" class="form-control" placeholder="Anahtar Kullanıcı Adı">
                        </div>
                        <div class="form-group">
                            <h3>Mail Adresi</h3>
                            <input id="email" type="email" class="form-control" placeholder="Destek verilecek Email Adresi">
                        </div>
                        <div class="form-group">
                            <h3>Betik Türü</h3>
                            <select class="form-control" name="inputs" id="inputType">
                                <option value="query">Sorgulama</option>
                                <option value="query">Çalıştırma</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                        <button type="button" class="btn btn-success" onclick="add()">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addInput() {
            var name = $("#inputName");
            var type = $("#inputType");
            if(name.val() === ""){
                return;
            }
            $(".inputs").append("<span onclick=\"removeInput('" + name.val() + "')\" class='input_list inputs_" + name.val() + "'>" + name.val() + "</span>");
            name.val("");
        }
        
        function removeInput(target) {
            $(".inputs_" + target).remove();
        }
    </script>
@endsection