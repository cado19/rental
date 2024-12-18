<?php
    include_once 'partials/header.php';
    // include_once 'partials/content_start.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $contract = lease_contract($id);
    $created  = strtotime($contract['created_at']);
    // $log->info('contract:', $contract);

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="assets/kizusi_contract_top.png" alt="">
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col">
            <h1>MOTOR VEHICLE LEASE AGREEMENT</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>THIS AGREEMENT is made on this day of <b><?php echo date("l jS \of F Y", $created); ?></b> </p>
            <p>BETWEEN</p>
            <p> <b><?php echo $contract['partner_name']; ?></b> .A limited company incorporated in the Republic of Kenya
                and whose address for service shall be p.O. Box 15017-00400 NAIROBI on the one part
                (Herein after referred to as the Supplier on the one part whose expressions shall include it’s
                Representatives, permitted assigns, agents or servants).</p>
            <p>-AND <b>KIZUSI SMARTEX LIMITED</b>, A limited company incorporated in the Republic of Kenya and
                Whose address for service shall be p.O. Box 8889-00100 NAIROBI (herein after referred to?
                As the Customer on the second part whose expressions shall include its representatives?
                Permitted assigns, agents or servants).</p>
            <br>
            <p>WHEREAS</p>
            <p>1. The Subject matter of this Agreement is the provision of motor vehicle hire services
            to the Customer;
            </p>
            <p>2. The Customer wishes to receive from the Supplier, and the Supplier is desirous of
Making available to the Customer its various Motor Vehicles to the Customer on the
Terms set out in this Agreement;
</p>
            <p>3. The Supplier acknowledges that the Customer is Car Rental Company and the
Customer shall Sub-Lease any of the Suppliers Motor Vehicles to its Clients
(Hereinafter known as hirers) from time to time;</p>
            <p>4. As far as this Agreement is concerned, the Customer is a Transport and Logistics
Company and is desirous of leasing any of the Supplier’s motor vehicles with the
Intention to sub-lease the Supplier’s motor Vehicles to its prospective Clients (herein
After known as hirers);</p>
            <p>NOW THIS AGREEMENT WITNESSETH AS FOLLOWS:</p>
            <p>Obligations of the Supplier</p>
            <p>1.The Supplier shall provide to the Customer such motor vehicles (Hereinafter known
                as the “Services”) for such periods as may be agreed with the Customer.</p>
            <p>2.The Supplier shall give the ability to have unrestricted use and enjoyment of its Motor
            Vehicle to the Customer when such services are requested by the Customer;
            </p>
            <p>3. The Supplier shall provide motor vehicles to the Customer on a Self- Drive basis
            Only;
            </p>
            <p>4.The Supplier undertakes to the Customer that throughout the term of this Agreement
            It shall ensure that all motor vehicles supplied by it to the Customer for purposes of
            Providing the Services under this Agreement:
            </p>
            <p>4.1  Shall be provided in a clean and tidy condition; and</p>
            <p>4.2 Are well maintained and kept in safe and road-worthy condition.</p>
            <p>5.  Where the Customer has requested the Supplier to provide Services for a period of
                Time, and the Supplier has provided these Services to the Customer or has indicated
                To the Customer that it will provide these Services but the motor vehicle that the
                Supplier had intended to provide to the Customer becomes unavailable for use
                (Whether due to an issue relating to maintenance, an accident, and illness or otherwise),
                Then the Supplier must use all commercially reasonable efforts to procure and ensure
                An alternative motor vehicle is made available to the Customer such that the
                Provision of Services remains uninterrupted.</p>
            <p>6.The Supplier shall provide to the Customer the following Motor vehicles as outlined in
And at those prices detailed in the following table, which shall be inclusive of:</p>
            <p>7.The Daily Fees outlined in Schedule 1 above are exclusive of VAT.</p>
            <p>8. The Supplier shall:</p>
            <p>8.1 Provide to the Customer details for each motor vehicle, including the mileage
Covered and fuel consumed, together with such other information as the
Customer may request from the Supplier from time to time;
</p>
            <p>8.2Allow the Customer and/or its employees, agents or representatives to inspect
The motor vehicles provided by the Supplier; and
</p>
            <p>8.3 Comply with all reasonable requests and instructions of the Customer in
connection with this Agreement.</p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MOTOR VEHICLE MODEL</th>
                        <th>DAILY FEE WHILE THE VEHICLE IS USED WITHIN NAIROBI COUNTY</th>
                        <th>DAILY FEE WHILE THE VEHICLE IS USED OUTSIDE OF NAIROBI COUNTY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Toyota Prado</td>
                        <td>Kshs. 10,000/- per day </td>
                        <td>Kshs. 3,000/- per day (Plus an additional Kshs.2,000/- as Drivers Allowance per day if necessary) </td>
                    </tr>
                    <tr>
                        <td>Mid –Suv s</td>
                        <td>Kshs.5,000</td>
                        <td>Kshs. 3,000/- per day (Plus an additional Kshs.2,000/- as Drivers Allowance per day if necessary)</td>
                    </tr>
                    <tr>
                        <td>Mid - cuvs</td>
                        <td>Kshs. 7,000</td>
                        <td>Kshs. 3,000/- per day (Plus an additional Kshs.2,000/- as Drivers Allowance per day if necessary) </td>
                    </tr>
                    <tr>
                        <td>Saloon Cars i.e Toyota Axio, Toyota Fielder</td>
                        <td>Kshs. 3,000/- per day</td>
                        <td>Kshs. 3,000/- per day (Plus an additional Kshs.2,000/- as Drivers Allowance per day if necessary)</td>
                    </tr>
                </tbody>
            </table>
            <p>9. The relationship between the Supplier and the Customer will be that of independent contractor, and nothing in this Agreement shall render the Supplier or any of its employees, agents or representatives an employee, worker, agent or partner of the Customer or any of its affiliated entities and the Supplier shall ensure that each of its employees, agents and representatives shall not, hold themselves out as such. The Supplier hereby indemnifies and keeps indemnified the Customer and each member of the Customer’s group for any tax, social security contribution and any other liability, deduction, contribution, assessment or claim arising from or made in connection with the performance of this Agreement in any jurisdiction, and shall reimburse the Customer for any of the same which the Customer or any member ofhe Customer’s group may become obliged to pay.</p>
            <p>Obligations of the Customer</p>
            <p>10.The Customer shall pay fees to the Supplier as detailed in the Schedule 1 above for
            the Services provided by the Supplier in accordance with this Agreement.
            </p>
            <p>11.The fees shall be payable to the Supplier by the Customer on upfront basis, upon the
                collection of any Motor Vehicle;</p>
            <p>12.The Supplier provides the Services on a basis which is exclusive of fuel and as such,
            the Customer shall fuel or pay for the cost of fuelling each of those motor vehicles
            provided by the Supplier to the Customer under this Agreement;
            </p>
            <p>13. The Supplier shall provide its motor vehicles for the Services to the Customer while
            having a full tank of fuel and the Customer shall be required to return the said Motor
            Vehicle having the same fuel level at the time of beginning of each engagement;</p>
            <p>14.The Customer indemnifies the Supplier for any Criminal or Civil liability that may
            Occur when providing the Services where a motor vehicle provided by the Supplier to
            The Customer is used to engage in any unlawful or illegal actions following any
            Instructions by or requests from the Customer or any of its employees;
            </p>
            <p>15. The Customer indemnifies and shall keep the Supplier indemnified of any criminal or
            civil liability when the Customer has a valid Self-Drive contract with it’s Hirers and the
            latter are in possession of the Supplier’s motor vehicles other than in accordance with
            this Agreement;</p>
            <p>16.The Customer shall at all times ensure it has a Valid Car Hire contract with any of it’s
Clients/hirers who will use the Suppliers Motor vehicles for value. In the event of any
civil claim against the supplier, the Customer shall indemnify and shall keep the
Supplier indemnified from any liability of loss, damage or injury to any of the
Customers Hirers;</p>
            <p>17.The Customer shall at all times maintain a record of every Hirer/Client using the
Suppliers Motor Vehicles for a consideration;
</p>
            <p>18.The Motor Vehicle shall be used for a maximum mileage of 500 KMS on a daily
basis, and the Supplier shall notify the Customer where a journey or a planned
Journey will exceed this maximum mileage figure;
</p>
            <p>19.The Customer covenants to the Supplier that it shall return to the Supplier each
Motor vehicle provided by the Supplier to the Customer in the same clean condition;</p>
            <p>20. The Customer shall from time-to-time sub-lease the Suppliers Motor Vehicles to its
Client’s and shall at all times execute a Car Rental Agreement with the Hirers of the
Various Motor Vehicles;
</p>
            <p>21.The Customer undertakes to the Supplier that throughout the term of this Agreement,
it shall ensure that each of the Hirers shall:
</p>
            <p>21.1 Be competent and drive the Suppliers cars with the highest levels of care, skill
And diligence in accordance with best practice outlined in the laws of Kenya;
</p>
            <p>21.2. Have and maintain current driving licenses which are valid for driving vehicles of the same class as the motor vehicle driven by them;
</p>
            <p>21.3. comply with the Road Regulations, the Kenyan Highway Code, the Traffic Act
and all other legal requirements which may apply to the use of the motor vehicle
From time to time;</p>
            <p>21.4.  execute a Car Rental Agreement at all times;</p>
            <p>21.5. Indemnify the Supplier any civil or criminal proceedings arising from any
Incident happening during the pendency of the Agreement; and</p>
            <p>21.6. Shall not drive after consuming alcohol, medication or any other substance that
Affects or may affect the driver’s ability to drive the motor vehicle.
General Provisions</p>
            <p>22. Without affecting any other right or remedy available to it, either party may terminate
this Agreement:
</p>
            <p>22.1 by delivering to the other party written notice to terminate, with the date for such
Termination being no sooner than 30-Days from the date of delivery of such
written notice;</p>
            <p>22.2 .with immediate effect by delivering to the other party written notice to terminate
if (i) that other party commits a material breach of any term of this Agreement
which is irremediable or (if such breach is capable of remedy) (ii) that other
party fails to remedy a material breach of any term of this Agreement within a
period of 5 days after being notified in writing to do so; or</p>
            <p>22.3 the other party suspends, or threatens to suspend, payment of its debts or is
unable to pay its debts as they fall due or admits inability to pay its debts or
(being a company) is deemed unable to pay its debts within the meaning of
section 384 of the Insolvency Act No. 18 of 2015 or (being an individual) is
deemed either unable to pay its debts or as having no reasonable prospect of
so doing, in either case, within the meaning of section 13 of the Insolvency Act
No. 18 of 2015.</p>
            <p>23.  On termination or before any scheduled termination of this Agreement, the Supplier
shall, if so requested by the Customer, provide all assistance reasonably required by
the Customer to facilitate the smooth transition of the Services to the Customer or
any replacement supplier appointed by it.
</p>
            <p>24. The following provisions shall continue in force notwithstanding any termination of the
Agreement: 7, 9, 11, Error! Reference source not found. 13, 14, 24, Error!
Reference source not found. 27, 32 and 33.</p>
            <p>25. No party shall assign, transfer, subcontract, delegate, declare a trust over or deal in
Any other manner with any of its rights and/or obligations under this Agreement.</p>
            <p>26. No variation of this agreement shall be effective unless it is in writing and signed by
The parties (or their authorized representatives).</p>
            <p>27. A waiver of any right or remedy under this Agreement or by law is only effective if
Given in writing, and shall not be deemed a waiver of any subsequent right or Remedy. A failure or delay by a party to exercise any right or remedy provided under This Agreement or by law shall not constitute a waiver of that or any other right or Remedy, nor shall it prevent or restrict any further exercise of that or any other right or Remedy. No single or partial exercise of any right or remedy provided under this
Agreement or by law shall prevent or restrict the further exercise of that or any other Right or remedy. </p>
            <p>28. This Agreement constitutes the entire agreement between the parties and Supersedes and extinguishes all previous agreements, promises, assurances, Warranties, representations and understandings between them, whether written or Oral, relating to its subject matter</p>
            <p>29.  Nothing in this Agreement is intended to, or shall be deemed to, establish any
Partnership or joint venture between the parties, constitute any party the agent of
Another party, or authorize any party to make or enter into any commitments for or on
Behalf of the other party</p>
            <p>30. No person who is not a party to this Agreement shall have any rights or be entitled to Enforce any obligations or provisions of this Agreement.</p>
            <p>31. This Agreement may be executed in any number of counterparts, each of which When executed shall constitute a duplicate original, but all the counterparts shall Together constitute the one agreement.</p>
            <p>32. . This Agreement and any dispute or claim (including non-contractual disputes or claims) arising out of or in connection with it or its subject matter or formation shall be governed by and construed in accordance with the Laws of Kenya;
</p>
            <p>33.  Each party irrevocably agrees that the courts of the Republic of Kenya shall have Exclusive jurisdiction to settle any dispute or claim (including non-contractual disputes Or claims) arising out of or in connection with this Agreement or its subject matter or formation.</p>

            <p>This Agreement is entered into on the date stated at the beginning of it.</p>
            <p>COMPANY NAME: <u><?php echo $contract['partner_name']; ?></u> </p>
            <p>DIRECTOR: </p>
            <p>CERTIFICATE NO: <u><?php show_value($contract, 'certificate_no'); ?></u></p>
            <p>SIGNATURE: <img src="partners/lease/signatures/<?php echo $contract['signature']; ?>" alt="Signature" class="signature-img"></p>
            <p>DATE: <u><?php echo date("l jS \of F Y", $created); ?></u></p>
            <p></p>

        </div>
    </div>
</div>