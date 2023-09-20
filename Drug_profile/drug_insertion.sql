INSERT INTO side_effects (se_name)
VALUES
    ('Headache'),
    ('Nausea'),
    ('Dizziness'),
    ('Fatigue'),
    ('Insomnia'),
    ('Dry mouth'),
    ('Constipation'),
    ('Diarrhea'),
    ('Vomiting'),
    ('Blurred vision'),
    ('Rash'),
    ('Swelling'),
    ('Heart palpitations'),
    ('Anxiety'),
    ('Depression'),
    ('Irritability'),
    ('Weight gain'),
    ('Weight loss'),
    ('Loss of appetite'),
    ('Muscle pain'),
    ('Joint pain'),
    ('Back pain'),
    ('Fever'),
    ('Chills'),
    ('Cough'),
    ('Shortness of breath'),
    ('Chest pain'),
    ('Abdominal pain'),
    ('Indigestion'),
    ('Gas'),
    ('Bloating'),
    ('Frequent urination'),
    ('Difficulty urinating'),
    ('Blood in urine'),
    ('Increased thirst'),
    ('Frequent infections'),
    ('Hair loss'),
    ('Nosebleeds'),
    ('Tinnitus'),
    ('Tremors'),
    ('Difficulty sleeping'),
    ('Night sweats'),
    ('Swollen lymph nodes'),
    ('Sore throat'),
    ('Cold sores'),
    ('Canker sores'),
    ('Numbness'),
    ('Tingling sensation'),
    ('Memory problems'),
    ('Confusion'),
    ('Hallucinations'),
    ('Mood swings'),
    ('Loss of libido'),
    ('Impotence'),
    ('Hot flashes'),
    ('Menstrual irregularities'),
    ('Swollen ankles'),
    ('Paleness'),
    ('Bruising'),
    ('Chest tightness'),
    ('Nasal congestion'),
    ('Runny nose'),
    ('Sneezing'),
    ('Itchy eyes'),
    ('Watery eyes'),
    ('Dry skin'),
    ('Itchy skin'),
    ('Excessive sweating'),
    ('Muscle spasms'),
    ('Difficulty concentrating'),
    ('Dry throat'),
    ('Heartburn'),
    ('Jaw pain'),
    ('Toothache'),
    ('Chest congestion'),
    ('Short-term memory loss'),
    ('Increased appetite'),
    ('Loss of coordination'),
    ('Blurry vision'),
    ('Sensitivity to light'),
    ('Swollen face'),
    ('Swollen tongue'),
    ('Metallic taste in mouth'),
    ('Unexplained bleeding'),
    ('Dark urine'),
    ('Yellowing of skin'),
    ('Fainting'),
    ('Loss of balance'),
    ('Nail discoloration'),
    ('Swollen fingers'),
    ('Swollen toes'),
    ('Frequent hiccups'),
    ('Stomach cramps'),
    ('Dry eyes'),
    ('Loss of smell'),
    ('Loss of taste'),
    ('Shortness of temper'),
    ('Difficulty swallowing'),
    ('Nervousness'),
    ('Loss of energy'),
    ('Loss of strength'),
    ('Hair thinning'),
    ('Joint swelling'),
    ('Muscle weakness'),
    ('Sensitivity to cold'),
    ('Sensitivity to heat'),
    ('Stomach ulcers'),
    ('Kidney pain'),
    ('Throat tightness'),
    ('Weight fluctuations'),
    ('Bleeding gums'),
    ('Nasal bleeding'),
    ('Frequent burping'),
    ('Facial flushing'),
    ('Difficulty speaking');





INSERT INTO drugs (drug_brand, drug_class, drug_active_ingredient, drug_inactive_ingredient)
VALUES
    ('Ortho Tri-Cyclen', 'Combination', 'Norgestimate, Ethinyl Estradiol', 'Lactose, Magnesium Stearate, Microcrystalline Cellulose'),
    ('Yasmin', 'Combination', 'Drospirenone, Ethinyl Estradiol', 'Lactose, Magnesium Stearate, Corn Starch'),
    ('Lo Loestrin Fe', 'Combination', 'Norethindrone, Ethinyl Estradiol', 'Lactose, Magnesium Stearate, Croscarmellose Sodium'),
    ('Alesse', 'Combination', 'Levonorgestrel, Ethinyl Estradiol', 'Lactose, Corn Starch, Magnesium Stearate'),
    ('Seasonique', 'Combination', 'Levonorgestrel, Ethinyl Estradiol', 'Lactose, Corn Starch, Magnesium Stearate'),
    ('Micronor', 'Progestin-Only', 'Norethindrone', 'Lactose, Magnesium Stearate, Corn Starch'),
    ('Norethindrone', 'Progestin-Only', 'Norethindrone', 'Lactose, Magnesium Stearate, Corn Starch'),
    ('Seasonale', 'Extended-Cycle', 'Levonorgestrel, Ethinyl Estradiol', 'Lactose, Corn Starch, Magnesium Stearate'),
    ('Lybrel', 'Extended-Cycle', 'Levonorgestrel, Ethinyl Estradiol', 'Lactose, Corn Starch, Magnesium Stearate'),
    ('Plan B One-Step', 'Emergency Contraceptive', 'Levonorgestrel', 'Lactose, Corn Starch, Magnesium Stearate'),
    ('Ella', 'Emergency Contraceptive', 'Ulipristal Acetate', 'Lactose, Magnesium Stearate, Corn Starch');


INSERT INTO drug_association_report (R_drug_fk_id, R_se_fk_id, report_date)
VALUES
    (1, 1, '2023-09-19 10:00:00'),  -- Drug 1, Side Effect 1, reported on 2023-09-19
    (1, 2, '2023-09-19 11:30:00'),  -- Drug 1, Side Effect 2, reported on 2023-09-19
    (2, 1, '2023-09-20 09:45:00'); 
    


INSERT INTO drug_association_fass (F_drug_fk_id, F_se_fk_id)
VALUES
    (1, 1),  -- Drug 1, Side Effect 1 is in FASS
    (2, 1),  -- Drug 2, Side Effect 1 is in FASS
    (2, 2);