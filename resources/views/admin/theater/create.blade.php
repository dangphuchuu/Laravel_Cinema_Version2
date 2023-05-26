<!-- Modal -->
<div class="modal fade modal-lg" id="TheaterCreateModal" tabindex="-1" aria-labelledby="TheaterCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TheaterCreateModalLabel">Edit Theater</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Theater name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="type name...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="address" class="form-label">Theater address</label>
                                <input class="form-control" id="address" type="text" name="address" placeholder="type address...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="city" class="form-label">Theater city</label>
                                <select id="city" class="form-select" name="city">
                                    <option value="An Giang">An Giang</option>
                                    <option value="Bac Giang">Bac Giang</option>
                                    <option value="Bac Kan">Bac Kan</option>
                                    <option value="Bac Lieu">Bac Lieu</option>
                                    <option value="Bac Ninh">Bac Ninh</option>
                                    <option value="Ba Ria-Vung Tau">Ba Ria-Vung Tau</option>
                                    <option value="Ben Tre">Ben Tre</option>
                                    <option value="Binh Dinh">Binh Dinh</option>
                                    <option value="Binh Duong">Binh Duong</option>
                                    <option value="Binh Phuoc">Binh Phuoc</option>
                                    <option value="Binh Thuan">Binh Thuan</option>
                                    <option value="Ca Mau">Ca Mau</option>
                                    <option value="Cao Bang">Cao Bang</option>
                                    <option value="Dac Lak">Dac Lak</option>
                                    <option value="Dac Nong">Dac Nong</option>
                                    <option value="Dien Bien">Dien Bien</option>
                                    <option value="Dong Nai">Dong Nai</option>
                                    <option value="Dong Thap">Dong Thap</option>
                                    <option value="Gia Lai">Gia Lai</option>
                                    <option value="Ha Giang">Ha Giang</option>
                                    <option value="Hai Duong">Hai Duong</option>
                                    <option value="Ha Nam">Ha Nam</option>
                                    <option value="Ha Tay">Ha Tay</option>
                                    <option value="Ha Tinh">Ha Tinh</option>
                                    <option value="Hau Giang">Hau Giang</option>
                                    <option value="Hoa Binh">Hoa Binh</option>
                                    <option value="Hung Yen">Hung Yen</option>
                                    <option value="Khanh Hoa">Khanh Hoa</option>
                                    <option value="Kien Giang">Kien Giang</option>
                                    <option value="Kon Tum">Kon Tum</option>
                                    <option value="Lai Chau">Lai Chau</option>
                                    <option value="Lam Dong">Lam Dong</option>
                                    <option value="Lang Son">Lang Son</option>
                                    <option value="Lao Cai">Lao Cai</option>
                                    <option value="Long An">Long An</option>
                                    <option value="Nam Dinh">Nam Dinh</option>
                                    <option value="Nghe An">Nghe An</option>
                                    <option value="Ninh Binh">Ninh Binh</option>
                                    <option value="Ninh Thuan">Ninh Thuan</option>
                                    <option value="Phu Tho">Phu Tho</option>
                                    <option value="Phu Yen">Phu Yen</option>
                                    <option value="Quang Binh">Quang Binh</option>
                                    <option value="Quang Nam">Quang Nam</option>
                                    <option value="Quang Ngai">Quang Ngai</option>
                                    <option value="Quang Ninh">Quang Ninh</option>
                                    <option value="Quang Tri">Quang Tri</option>
                                    <option value="Soc Trang">Soc Trang</option>
                                    <option value="Son La">Son La</option>
                                    <option value="Tay Ninh">Tay Ninh</option>
                                    <option value="Thai Binh">Thai Binh</option>
                                    <option value="Thai Nguyen">Thai Nguyen</option>
                                    <option value="Thanh Hoa">Thanh Hoa</option>
                                    <option value="Thua Thien-Hue">Thua Thien-Hue</option>
                                    <option value="Tien Giang">Tien Giang</option>
                                    <option value="Tra Vinh">Tra Vinh</option>
                                    <option value="Tuyen Quang">Tuyen Quang</option>
                                    <option value="Vinh Long">Vinh Long</option>
                                    <option value="Vinh Phuc">Vinh Phuc</option>
                                    <option value="Yen Bai">Yen Bai</option>
                                    <option value="Can Tho">Can Tho</option>
                                    <option value="Da Nang">Da Nang</option>
                                    <option value="Hai Phong">Hai Phong</option>
                                    <option value="Hanoi">Hanoi</option>
                                    <option value="Ho Chi Minh">Ho Chi Minh</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="location" class="form-control-label">Theater location</label>
                                <input class="form-control" id="location" type="text" name="location"
                                       placeholder="type location...">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@section('scrips')
    <script>
        $(document).ready(function () {
            $('#city').select2();
        })
    </script>
@endsection
