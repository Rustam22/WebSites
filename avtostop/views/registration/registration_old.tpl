{extends file="base.tpl"}

{block name="content"}
	
	<div class="faq-title print">Abunəçinin qeydiyyatı</div>
	
	
	<div class="page-register">
            <table>
                <tr>
                    <td>Ad:</td>
                    <td><input type="text" name="reg_name" id="reg_name" maxlength="10" class="reg_input" /></td>
                    <td>Soyad:</td>
                    <td><input type="text" name="reg_surname" id="reg_surname" class="reg_input" /></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="reg_email" id="reg_email" class="reg_input" /></td>
                    <td>Mobil telefon</td>
                    <td><input type="text" name="reg_phone" id="reg_phone" class="reg_input" /></td>
                </tr>
                <tr>
                    <td>Şifrə</td>
                    <td><input type="text" name="reg_password" id="reg_password" class="reg_input" /></td>
                    <td>Təkrar şifrə</td>
                    <td><input type="text" name="name" id="reg_repassword" class="reg_input" /></td>
                </tr>
            </table><br/>
            <b>Abuneçilik nedir?</b><br/>
            Avtostop saytının abunəçisi olaraq, siz aşağıdakı genişlənmiş imkanlarından faydalana bilərsiniz:<br/>
            1. Dj Turala sual vermek <br/>
            2. Saytın avtomobil alqı-satqısı bölməsində elan yerləşdirmək.<br/>
            3. Saytın onlayn-imtahan bölməsindən istifadə etmək.<br/><br/>
            <b>Abunəçiliyin SMS-sorğudan və Dj Turala zəngdən nə üstünlüyü var?</b><br/>
            Abunəçiliyin əsas üstünlüyü odur ki, sms və ya telefon zəngi formatında verə bilmədiyiniz 
            suallara, məsələn, çətin və ya cavabı yazılı şəkildə lazım olan suallara Avtostop saytı cavabları ala 
            bilərsiniz. Bir sözlə, Dj Turaldan ətraflı konsultasiya almaq imkanınız var. Digər üstünlük odur ki, 
            siz Dj Turala daha çox sual verə bilərsiniz, abunə haqqı isə stabil olaraq ayda cəmi 1 manat qalır.<br/><br/>
            <b>Abunə haqqı nə qədərdir?</b><br/>
            Abunəçilik üçün aylıq ödeniş cəmi 1 manat təşkil edir, üstəlik ödeniş forması da rahatdır – 
            abunə haqqı qeydiyyat vaxtı göstərilən telefon nömrəsinin balansından her ayın əvvəlində silinir.<br/><br/>
            <b>Abunəçi olmaq üçün nə etmək lazımdır?</b><br/>
            Avtostop saytına abunə olmaq üçün yuxarıdakı formanı dolduraraq, qeydiyyatdan keçmək lazımdır.
            <br/><br/>
            <input type="checkbox" name="policy_ok" id="policy_ok"/><label for="policy_ok">Abunəçilik qaydalarını qəbul edirəm</label>
            <br/>
            <input type="button" name="reg_ok" value="Göndər" id="reg_ok" disabled="disabled" />
	</div>
{/block}