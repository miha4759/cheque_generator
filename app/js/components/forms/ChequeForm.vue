<template>
    <div class="row">
        <div class="col-12 col-lg-10">
            <form class="p-4 p-md-5 border rounded-3">
                <!-- User data -->
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-left">Your data:</h3>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[full_name]" class="form-control" id="FullName"
                                   v-model="user.full_name"
                                   placeholder="John Smith">
                            <label for="FullName">Full name</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[province]" class="form-control" id="Province"
                                   v-model="user.province"
                                   placeholder="East England">
                            <label for="Province">Province</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[street]" class="form-control" id="Street"
                                   v-model="user.street"
                                   placeholder="Main street">
                            <label for="Street">Street name</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[town]" class="form-control" id="Town"
                                   v-model="user.town"
                                   placeholder="Southend-on-Sea">
                            <label for="Town">Town name</label>
                        </div>
                    </div>
                    <div class="col-12  col-lg-2">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[postal_code]" class="form-control" id="PostalCode"
                                   v-model="user.postal_code"
                                   placeholder="SS2 6UN">
                            <label for="PostalCode">Postal code</label>
                        </div>
                    </div>
                </div>
                <!-- end User data -->
                <!-- Bank data -->
                <div class="row mt-3">
                    <div class="col-12">
                        <h3 class="text-left">Bank data:</h3>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[name]" class="form-control" id="BankName"
                                   v-model="bank.name"
                                   placeholder="GlobalBank">
                            <label for="BankName">Bank name</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[province]" class="form-control" id="BankProvince"
                                   v-model="bank.province"
                                   placeholder="East England">
                            <label for="BankProvince">Province</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[street]" class="form-control" id="BankStreet"
                                   v-model="bank.street"
                                   placeholder="Main street">
                            <label for="BankStreet">Street name</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[town]" class="form-control" id="BankTown"
                                   v-model="bank.town"
                                   placeholder="Southend-on-Sea">
                            <label for="BankTown">Town name</label>
                        </div>
                    </div>
                    <div class="col-12  col-lg-2">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[postal_code]" class="form-control" id="BankPostalCode"
                                   v-model="bank.postal_code"
                                   placeholder="Southend-on-Sea">
                            <label for="BankPostalCode">Postal code</label>
                        </div>
                    </div>
                </div>
                <!-- end Bank data -->
                <!-- Cheque data -->
                <div class="row mt-3">
                    <div class="col-12">
                        <h3 class="text-left">Cheque data:</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="form-floating mb-3">
                            <input type="text" name="cheque[recipient]" class="form-control" id="Recipient"
                                   v-model="cheque.recipient"
                                   placeholder="John John">
                            <label for="Recipient">Recipient</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="number" name="cheque[amount]" step="0.01" class="form-control" id="Amount"
                                   v-model="cheque.amount"
                                   placeholder="1200">
                            <label for="Amount">Amount, £</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" name="cheque[memo]" class="form-control" id="Memo"
                                   v-model="cheque.memo"
                                   placeholder="Rent payment">
                            <label for="Memo">Memo</label>
                        </div>
                    </div>
                </div>
                <!-- end Cheque data -->

                <div class="row mt-3">
                    <div class="col-12">
                        <button class="w-100 btn btn-lg btn-primary" @click.prevent="submit" type="submit">Get cheque!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import networkMixins from "../../mixins/networkMixins";

    export default {
        name: "ChequeForm",
        mixins: [
            networkMixins
        ],
        data() {
            return {
                userId: null,
                bankId: null,

                bank: {
                    name: '',
                    province: '',
                    street: '',
                    town: '',
                    postal_code: '',
                },
                user: {
                    full_name: '',
                    province: '',
                    street: '',
                    town: '',
                    postal_code: '',
                },
                cheque: {
                    memo: '',
                    recipient: '',
                    amount: 0,
                }
            }
        },
        methods: {
            submit() {
                const data = {
                    user_id: this.user_id,
                    bank_id: this.bankId,
                    bank: this.bank,
                    user: this.user,
                    cheque: this.cheque,
                }
                this.helpPost('/cheques/generate', data, (success) => {
                    console.log(success);
                });

            }
        },
    }
</script>

<style scoped>

</style>