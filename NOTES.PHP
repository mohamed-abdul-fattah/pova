<?php

categories {
    # parent_id default 0
    # name_en
    # name_ar
}

Class Category {
    categories(); hasMany
    resources();  hasMany
    parent();     belongsTo
    prices();     hasMany
    basePrice();  hasOne where availability_id === 0
}
-----------------------------------

resources {
    # category_id
    # user_id
    # title_en
    # title_ar
    # featured default 0
    # deleted_at
}

Class Resource {
    category(); belongsTo
    owner();    belongsTo
}
-----------------------------------

features {
    # name_en
    # name_ar
    # type enum(text, email, number, boolean, selection)
    # required default 1
    # selections nullable
}

Class Feature {
    //
}
-----------------------------------

acquired_features {
    # feature_id
    # featureable_id
    # featureable_type
    # value_string nullable
    # value_number nullable
    # value_boolean nullable
    # value_text nullable
}

Class AcquiredFeature {
    //
}
-----------------------------------

prices {
    # resource_id
    # unit_id
    # price
    # currency  default EGP
    # availability_id default 0
}

Class Price {
    //
}
-----------------------------------

availabilities {
    # resource_id
    # start
    # end
    # type enum('unavailable, season')
}

Class Availability {
    //
}
-----------------------------------

cities {
    # country_id
    # name_en
    # name_ar
}

Class City {
    //
}
-----------------------------------

units {
    # name_en
    # name_ar
    # type enum('day')
}

Class Unit {
    //
}
-----------------------------------
