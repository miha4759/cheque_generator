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
                                   :class="errorClass('user', 'full_name')"
                                   placeholder="John Smith">
                            <label for="FullName">Full name</label>
                            <div class="invalid-feedback" v-if="errors.user !== undefined && errors.user.full_name">
                                {{ this.getErrorMessage(errors.user.full_name) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[province]" class="form-control" id="Province"
                                   v-model="user.province"
                                   :class="errorClass('user', 'province')"
                                   placeholder="East England">
                            <label for="Province">Province</label>
                            <div class="invalid-feedback" v-if="errors.user !== undefined && errors.user.province">
                                {{ this.getErrorMessage(errors.user.province) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[street]" class="form-control" id="Street"
                                   v-model="user.street"
                                   :class="errorClass('user', 'street')"
                                   placeholder="Main street">
                            <label for="Street">Street name</label>
                            <div class="invalid-feedback" v-if="errors.user !== undefined && errors.user.street">
                                {{ this.getErrorMessage(errors.user.street) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[town]" class="form-control" id="Town"
                                   v-model="user.town"
                                   :class="errorClass('user', 'town')"
                                   placeholder="Southend-on-Sea">
                            <label for="Town">Town name</label>
                            <div class="invalid-feedback" v-if="errors.user !== undefined && errors.user.town">
                                {{ this.getErrorMessage(errors.user.town) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12  col-lg-2">
                        <div class="form-floating mb-3">
                            <input type="text" name="user[postal_code]" class="form-control" id="PostalCode"
                                   v-model="user.postal_code"
                                   :class="errorClass('user', 'postal_code')"
                                   placeholder="SS2 6UN">
                            <label for="PostalCode">Postal code</label>
                            <div class="invalid-feedback" v-if="errors.user !== undefined && errors.user.postal_code">
                                {{ this.getErrorMessage(errors.user.postal_code) }}
                            </div>
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
                                   :class="errorClass('bank', 'name')"
                                   placeholder="GlobalBank">
                            <label for="BankName">Bank name</label>
                            <div class="invalid-feedback" v-if="errors.bank !== undefined && errors.bank.name">
                                {{ this.getErrorMessage(errors.bank.name) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[province]" class="form-control" id="BankProvince"
                                   v-model="bank.province"
                                   :class="errorClass('bank', 'province')"
                                   placeholder="East England">
                            <label for="BankProvince">Province</label>
                            <div class="invalid-feedback" v-if="errors.bank !== undefined && errors.bank.province">
                                {{ this.getErrorMessage(errors.bank.province) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[street]" class="form-control" id="BankStreet"
                                   v-model="bank.street"
                                   :class="errorClass('bank', 'street')"
                                   placeholder="Main street">
                            <label for="BankStreet">Street name</label>
                            <div class="invalid-feedback" v-if="errors.bank !== undefined && errors.bank.street">
                                {{ this.getErrorMessage(errors.bank.street) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[town]" class="form-control" id="BankTown"
                                   v-model="bank.town"
                                   :class="errorClass('bank', 'town')"
                                   placeholder="Southend-on-Sea">
                            <label for="BankTown">Town name</label>
                            <div class="invalid-feedback" v-if="errors.bank !== undefined && errors.bank.town">
                                {{ this.getErrorMessage(errors.bank.town) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12  col-lg-2">
                        <div class="form-floating mb-3">
                            <input type="text" name="bank[postal_code]" class="form-control" id="BankPostalCode"
                                   v-model="bank.postal_code"
                                   :class="errorClass('bank', 'postal_code')"
                                   placeholder="Southend-on-Sea">
                            <label for="BankPostalCode">Postal code</label>
                            <div class="invalid-feedback" v-if="errors.bank !== undefined && errors.bank.postal_code">
                                {{ this.getErrorMessage(errors.bank.postal_code) }}
                            </div>
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
                                   :class="errorClass('cheque', 'recipient')"
                                   placeholder="John John">
                            <label for="Recipient">Recipient</label>
                            <div class="invalid-feedback" v-if="errors.cheque !== undefined && errors.cheque.recipient">
                                {{ this.getErrorMessage(errors.cheque.recipient) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="number" name="cheque[amount]" step="0.01" class="form-control" id="Amount"
                                   v-model="cheque.amount"
                                   :class="errorClass('cheque', 'amount')"
                                   placeholder="1200">
                            <label for="Amount">Amount, £</label>
                            <div class="invalid-feedback" v-if="errors.cheque !== undefined && errors.cheque.amount">
                                {{ this.getErrorMessage(errors.cheque.amount) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" name="cheque[memo]" class="form-control" id="Memo"
                                   v-model="cheque.memo"
                                   :class="errorClass('cheque', 'memo')"
                                   placeholder="Rent payment">
                            <label for="Memo">Memo</label>
                            <div class="invalid-feedback" v-if="errors.cheque !== undefined && errors.cheque.memo">
                                {{ this.getErrorMessage(errors.cheque.memo) }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Cheque data -->

                <div class="row mt-3">
                    <div class="col-12">
                        <button class="w-100 btn btn-lg btn-primary" @click.prevent="submit" type="submit">
                            <template v-if="networkProcessing">
                                <div class="spinner-border text-light" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </template>
                            <template v-else>
                                Get cheque!
                            </template>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="place-for-cheque mt-5" v-if="chequeHtml" >
            <h2 class="text-left">Your cheque</h2>
            <div class="mt-3" v-html="chequeHtml"></div>
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
                chequeHtml: null,

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
        computed: {
            errorClass() {
                return (object, error) => {
                    return this.errors[object] !== undefined && this.errors[object][error] !== undefined ? 'is-invalid' : false;
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
                this.errors = [];

                this.helpPost('/cheques/generate', data, (success) => {
                    this.chequeHtml = success.html;
                });

            }
        },
    }
</script>

<style scoped>

</style>