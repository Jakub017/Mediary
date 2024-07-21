<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Test</title>
    </head>
    <body>
        <form
            class="blood-form"
            action="{{ route('bloodTest') }}"
            method="POST"
        >
            @csrf @METHOD('POST') @if ($errors->any()) @foreach($errors->all()
            as $error)
            {{ $error }}
            @endforeach @endif

            <div class="blood-form__group">
                <label for="hgb">Waga [kg]</label>
                <input type="number" name="weight" placeholder="Twoja waga" />
            </div>

            <div class="blood-form__group">
                <label for="hgb">Wzrost [cm]</label>
                <input type="number" name="height" placeholder="Twój wzrost" />
            </div>

            <div class="blood-form__group">
                <label for="hgb">Wiek [lata]</label>
                <input type="number" name="age" placeholder="Twój wiek" />
            </div>

            <div class="blood-form__group">
                <label for="hgb">Płec</label>
                <select name="gender" id="">
                    <option value="">Płec</option>
                    <option value="male">Mezczyżyzna</option>
                    <option value="female">Kobieta</option>
                </select>
            </div>

            <div class="blood-form__group">
                <label for="hgb">Hemoglobina [g/dL]</label>
                <input
                    type="number"
                    name="hgb"
                    placeholder="Hemoglobina (HGB)"
                />
            </div>

            <div class="blood-form__group">
                <label for="rbc">Erytrocyty [10^6/µL]</label>
                <input
                    type="number"
                    name="rbc"
                    placeholder="Erytrocyty (RBC)"
                />
            </div>

            <div class="blood-form__group">
                <label for="hct">Hematokryt [%]</label>
                <input
                    type="number"
                    name="hct"
                    placeholder="Hematokryt (HCT)"
                />
            </div>

            <div class="blood-form__group">
                <label for="mcv">MCV [fL]</label>
                <input type="number" name="mcv" placeholder="MCV" />
            </div>

            <div class="blood-form__group">
                <label for="mch">MCH [pg]</label>
                <input type="number" name="mch" placeholder="MCH" />
            </div>

            <div class="blood-form__group">
                <label for="mchc">MCHC [g/dL]</label>
                <input type="number" name="mchc" placeholder="MCHC" />
            </div>

            <div class="blood-form__group">
                <label for="rdw">RDW [%]</label>
                <input type="number" name="rdw" placeholder="RDW" />
            </div>

            <div class="blood-form__group">
                <label for="wbc">Leukocyty [10^3/µL]</label>
                <input type="number" name="wbc" placeholder="WBC" />
            </div>

            <div class="blood-form__group">
                <label for="plt">Płytki krwi [10^3/µL]</label>
                <input type="number" name="plt" placeholder="PLT" />
            </div>

            <div class="blood-form__group">
                <label for="mpv">MPV [fL]</label>
                <input type="number" name="mpv" placeholder="MPV" />
            </div>

            <div class="blood-form__group">
                <label for="pdw">PDW [%]</label>
                <input type="number" name="pdw" placeholder="PDW" />
            </div>
            <button type="submit">Wyślij</button>
        </form>
    </body>
</html>
